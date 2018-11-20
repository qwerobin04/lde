<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registration[]|\Cake\Collection\CollectionInterface $registration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Registration'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registration index large-9 medium-8 columns content">
    <h3><?= __('Registration') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BusinessName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NatureofBusiness') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BusinessAddress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ContactNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EmailAddress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FacebookPage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BusinessOwnersName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FullName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registration as $registration): ?>
            <tr>
                <td><?= $this->Number->format($registration->id) ?></td>
                <td><?= h($registration->BusinessName) ?></td>
                <td><?= h($registration->NatureofBusiness) ?></td>
                <td><?= h($registration->BusinessAddress) ?></td>
                <td><?= $this->Number->format($registration->ContactNumber) ?></td>
                <td><?= h($registration->EmailAddress) ?></td>
                <td><?= h($registration->Website) ?></td>
                <td><?= h($registration->FacebookPage) ?></td>
                <td><?= h($registration->BusinessOwnersName) ?></td>
                <td><?= h($registration->FullName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $registration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registration->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
