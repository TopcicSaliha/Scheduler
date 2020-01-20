<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieActor[]|\Cake\Collection\CollectionInterface $movieActors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movie Actor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieActors index large-9 medium-8 columns content">
    <h3><?= __('Movie Actors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actors_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movies_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movieActors as $movieActor): ?>
            <tr>
                <td><?= $this->Number->format($movieActor->id) ?></td>
                <td><?= $movieActor->has('actor') ? $this->Html->link($movieActor->actor->name, ['controller' => 'Actors', 'action' => 'view', $movieActor->actor->id]) : '' ?></td>
                <td><?= $movieActor->has('movie') ? $this->Html->link($movieActor->movie->title, ['controller' => 'Movies', 'action' => 'view', $movieActor->movie->id]) : '' ?></td>
                <td><?= h($movieActor->role) ?></td>
                <td><?= $this->Number->format($movieActor->created_by) ?></td>
                <td><?= $this->Number->format($movieActor->updated_by) ?></td>
                <td><?= h($movieActor->modified) ?></td>
                <td><?= h($movieActor->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movieActor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movieActor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movieActor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieActor->id)]) ?>
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
