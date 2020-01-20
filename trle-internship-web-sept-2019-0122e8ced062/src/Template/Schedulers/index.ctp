<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheduler[]|\Cake\Collection\CollectionInterface $schedulers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scheduler'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedulers index large-9 medium-8 columns content">
    <h3><?= __('Schedulers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alert') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedulers as $scheduler): ?>
            <tr>
                <td><?= $this->Number->format($scheduler->id) ?></td>
                <td><?= $this->Number->format($scheduler->model_id) ?></td>
                <td><?= h($scheduler->model) ?></td>
                <td><?= $scheduler->has('user') ? $this->Html->link($scheduler->user->id, ['controller' => 'Users', 'action' => 'view', $scheduler->user->id]) : '' ?></td>
                <td><?= h($scheduler->start_on) ?></td>
                <td><?= h($scheduler->alert) ?></td>
                <td><?= $this->Number->format($scheduler->created_by) ?></td>
                <td><?= $this->Number->format($scheduler->updated_by) ?></td>
                <td><?= h($scheduler->modified) ?></td>
                <td><?= h($scheduler->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scheduler->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scheduler->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scheduler->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduler->id)]) ?>
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
