<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TvShowActor[]|\Cake\Collection\CollectionInterface $tvShowActors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tv Show Actor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tv Shows'), ['controller' => 'TvShows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tv Show'), ['controller' => 'TvShows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tvShowActors index large-9 medium-8 columns content">
    <h3><?= __('Tv Show Actors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actors_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tv_shows_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tvShowActors as $tvShowActor): ?>
            <tr>
                <td><?= $this->Number->format($tvShowActor->id) ?></td>
                <td><?= $tvShowActor->has('actor') ? $this->Html->link($tvShowActor->actor->name, ['controller' => 'Actors', 'action' => 'view', $tvShowActor->actor->id]) : '' ?></td>
                <td><?= $tvShowActor->has('tv_show') ? $this->Html->link($tvShowActor->tv_show->title, ['controller' => 'TvShows', 'action' => 'view', $tvShowActor->tv_show->id]) : '' ?></td>
                <td><?= h($tvShowActor->role) ?></td>
                <td><?= $this->Number->format($tvShowActor->created_by) ?></td>
                <td><?= $this->Number->format($tvShowActor->updated_by) ?></td>
                <td><?= h($tvShowActor->modified) ?></td>
                <td><?= h($tvShowActor->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tvShowActor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tvShowActor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tvShowActor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tvShowActor->id)]) ?>
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
