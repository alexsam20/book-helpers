<?php

namespace Core\Validator;

use Core\DataBase\DatabaseInterface;

class Validator implements ValidatorInterface
{
    private array $errors = [];
    private array $data;

    public function __construct(
        private readonly DatabaseInterface $db,
    )
    {
    }

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];
        $this->data = $data;

        foreach ($rules as $key => $rule) {
            $rules = $rule;

            foreach ($rules as $item) {
                $item = explode(':', $item);

                $ruleName = $item[0];
                $ruleValue = $item[1] ?? null;

                $error = $this->validateRule($key, $ruleName, $ruleValue);

                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function validateRule(string $key, string $ruleName, ?string $ruleValue = null): string|false
    {
        $value = $this->data[$key];

        if ($ruleName === 'required' && !$value) {
            $this->addErrorForRule($key, 'required');
        }
        if ($ruleName === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addErrorForRule($key, 'email');
        }
        if ($ruleValue === 'numeric' && !is_numeric($value)) {
            $this->addErrorForRule($key, 'numeric');
        }
        if ($ruleName === 'min' && mb_strlen($value) < $ruleValue) {
            $this->addErrorForRule($key, 'min', $ruleValue);
        }
        if ($ruleName === 'max' && mb_strlen($value) > $ruleValue) {
            $this->addErrorForRule($key, 'max', $ruleValue);
        }
        if ($ruleName === 'match' && $value !== $this->data[$ruleValue]) {
            $this->addErrorForRule($key, 'match', $ruleValue);
        }
        if ($ruleName === 'unique') {
            if ($ruleValue[mb_strlen($ruleValue) - 1] !== '?') {
                $record = $this->db->first(rtrim($ruleValue, '?'), [$key => $value]);
                if ($record) {
                    $this->addErrorForRule($key, 'unique', $key);
                }
            }
        }

        return false;
    }

    private function addErrorForRule(string $key, string $rule, $params = null): void
    {
        $message = $this->errorMessages()[$rule] ?? '';
        if (null !== $params) {
            $message = str_replace("{{$rule}}", $params, $message);
        }
        $this->errors[$key][] = $message;
    }

    private function errorMessages(): array
    {
        return  [
            'required' => 'Field is required',
            'email' => 'This field must be valid email address',
            'min' => 'Min length of this field must be {min}',
            'max' => 'Max length of this field must be {max}',
            'numeric' => 'This field must be a number',
            'match' => 'This field must be the same as {match}',
            'unique' => 'Record with this {unique} already exists',
        ];
    }
}