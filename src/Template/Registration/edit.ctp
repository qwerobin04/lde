<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration $registration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $registration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Registration'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="registration form large-9 medium-8 columns content">
    <?= $this->Form->create($registration) ?>
    <fieldset>
        <legend><?= __('Edit Registration') ?></legend>
        <?php
            echo $this->Form->control('BusinessName');
            echo $this->Form->control('NatureofBusiness');
            echo $this->Form->control('BusinessAddress');
            echo $this->Form->control('ContactNumber');
            echo $this->Form->control('EmailAddress');
            echo $this->Form->control('Website');
            echo $this->Form->control('FacebookPage');
            echo $this->Form->control('BusinessOwnersName');
            echo $this->Form->control('FullName');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
