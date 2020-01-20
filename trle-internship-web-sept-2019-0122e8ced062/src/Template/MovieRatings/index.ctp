<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieRating[]|\Cake\Collection\CollectionInterface $movieRatings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movie Rating'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieRatings index large-9 medium-8 columns content">
    <h3><?= __('Movie Ratings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movies_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movieRatings as $movieRating): ?>
            <tr>
                <td><?= $this->Number->format($movieRating->id) ?></td>
                <td><?= $movieRating->has('user') ? $this->Html->link($movieRating->user->id, ['controller' => 'Users', 'action' => 'view', $movieRating->user->id]) : '' ?></td>
                <td><?= $movieRating->has('movie') ? $this->Html->link($movieRating->movie->title, ['controller' => 'Movies', 'action' => 'view', $movieRating->movie->id]) : '' ?></td>
                <td><?= h($movieRating->action) ?></td>
                <td><?= $this->Number->format($movieRating->created_by) ?></td>
                <td><?= $this->Number->format($movieRating->updated_by) ?></td>
                <td><?= h($movieRating->modified) ?></td>
                <td><?= h($movieRating->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movieRating->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movieRating->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movieRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieRating->id)]) ?>
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
