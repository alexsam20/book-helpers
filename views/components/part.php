<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \App\Models\Part $part */ ?>
<?php /** @var \App\Controllers\PartController $object */  ?>
<?php /** @var \App\Models\Part $i */ ?>
<tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
    <!-- Number -->
    <td class="px-6 py-2 text-center">
        <?php echo $i; ?>
    </td>
    <!-- Title -->
    <td class="px-6 py-2 font-medium text-heading">
        <a href="show?id=<?php echo $part->id(); ?>">
            <?php echo $part->title(); ?>
        </a>
    </td>
    <!-- Count Block Code -->
    <td class="px-6 py-2 text-center">
        <?php  $amount = count($part->codeBlocks()); ?>
        <div class="inline-flex items-center space-x-1">
            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium inset-ring <?php echo $object->getCss($amount) ?>"><?php echo $amount; ?></span>
        </div>
    </td>
    <!-- CreatedAt Date -->
    <td class="px-6 py-2 text-right">
        <?php echo $view->formatDate($part->createdAt()); ?>
    </td>
</tr>

