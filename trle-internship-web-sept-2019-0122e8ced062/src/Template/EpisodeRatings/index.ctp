<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeRating[]|\Cake\Collection\CollectionInterface $episodeRatings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Episode Rating'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Episodes'), ['controller' => 'Episodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Episode'), ['controller' => 'Episodes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="episodeRatings index large-9 medium-8 columns content">
    <h3><?= __('Episode Ratings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('episodes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($episodeRatings as $episodeRating): ?>
            <tr>
                <td><?= $this->Number->format($episodeRating->id) ?></td>
                <td><?= $episodeRating->has('user') ? $this->Html->link($episodeRating->user->id, ['controller' => 'Users', 'action' => 'view', $episodeRating->user->id]) : '' ?></td>
                <td><?= $episodeRating->has('episode') ? $this->Html->link($episodeRating->episode->title, ['controller' => 'Episodes', 'action' => 'view', $episodeRating->episode->id]) : '' ?></td>
                <td><?= h($episodeRating->action) ?></td>
                <td><?= $this->Number->format($episodeRating->created_by) ?></td>
                <td><?= $this->Number->format($episodeRating->updated_by) ?></td>
                <td><?= h($episodeRating->modified) ?></td>
                <td><?= h($episodeRating->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $episodeRating->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodeRating->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodeRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodeRating->id)]) ?>
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
