<?php

namespace Core\Session;

use Core\Http\RequestInterface;
use Random\RandomException;

class Session implements SessionInterface
{
    public const string CSRF_INPUT_TOKEN = '_csrf';
    public const string CSRF_SESSION_TOKEN = 'csrf_token';

    public function __construct(
        private readonly RequestInterface $request
    )
    {
        session_start();
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function getFlash(string $key, $default = null)
    {
        $value = $this->get($key, $default);
        $this->remove($key);

        return $value;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_destroy();
    }

    public function handle(): void
    {
        if ($this->request->method() === 'POST') {
            $inputToken = $this->request->input(self::CSRF_INPUT_TOKEN);
            if (null === $inputToken) {
                $inputToken = json_decode(file_get_contents('php://input'), true)['_csrf'];
            }
            if (
                !empty($inputToken) &&
                !empty($this->get(self::CSRF_SESSION_TOKEN)) &&
                $inputToken === $this->get(self::CSRF_SESSION_TOKEN)
            )
            {
                $this->remove(self::CSRF_SESSION_TOKEN);

                return;
            }

            http_response_code(419);
            echo "Error: CSRF token mismatch";
            die();
        }
    }

    /**
     * @throws RandomException
     */
    public function csrf_token(): string
    {
        if (empty($this->get(self::CSRF_SESSION_TOKEN))) {
            $token = bin2hex(random_bytes(32));
            $this->set(self::CSRF_SESSION_TOKEN, $token);
        }
        return $this->get(self::CSRF_SESSION_TOKEN);
    }
}