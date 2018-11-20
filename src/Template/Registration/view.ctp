<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration $registration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Registration'), ['action' => 'edit', $registration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Registration'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Registration'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registration'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="registration view large-9 medium-8 columns content">
    <h3><?= h($registration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('BusinessName') ?></th>
            <td><?= h($registration->BusinessName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NatureofBusiness') ?></th>
            <td><?= h($registration->NatureofBusiness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BusinessAddress') ?></th>
            <td><?= h($registration->BusinessAddress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EmailAddress') ?></th>
            <td><?= h($registration->EmailAddress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website') ?></th>
            <td><?= h($registration->Website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FacebookPage') ?></th>
            <td><?= h($registration->FacebookPage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BusinessOwnersName') ?></th>
            <td><?= h($registration->BusinessOwnersName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FullName') ?></th>
            <td><?= h($registration->FullName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($registration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ContactNumber') ?></th>
            <td><?= $this->Number->format($registration->ContactNumber) ?></td>
        </tr>
    </table>
</div>
