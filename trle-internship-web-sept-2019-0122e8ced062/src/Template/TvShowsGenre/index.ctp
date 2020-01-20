<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TvShowsGenre[]|\Cake\Collection\CollectionInterface $tvShowsGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tv Shows Genre'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tv Shows'), ['controller' => 'TvShows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tv Show'), ['controller' => 'TvShows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tvShowsGenre index large-9 medium-8 columns content">
    <h3><?= __('Tv Shows Genre') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genres_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tv_shows_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tvShowsGenre as $tvShowsGenre): ?>
            <tr>
                <td><?= $this->Number->format($tvShowsGenre->id) ?></td>
                <td><?= $tvShowsGenre->has('genre') ? $this->Html->link($tvShowsGenre->genre->id, ['controller' => 'Genres', 'action' => 'view', $tvShowsGenre->genre->id]) : '' ?></td>
                <td><?= $tvShowsGenre->has('tv_show') ? $this->Html->link($tvShowsGenre->tv_show->title, ['controller' => 'TvShows', 'action' => 'view', $tvShowsGenre->tv_show->id]) : '' ?></td>
                <td><?= $this->Number->format($tvShowsGenre->created_by) ?></td>
                <td><?= $this->Number->format($tvShowsGenre->updated_by) ?></td>
                <td><?= h($tvShowsGenre->modified) ?></td>
                <td><?= h($tvShowsGenre->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tvShowsGenre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tvShowsGenre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tvShowsGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tvShowsGenre->id)]) ?>
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
