<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoviesGenre[]|\Cake\Collection\CollectionInterface $moviesGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movies Genre'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="moviesGenre index large-9 medium-8 columns content">
    <h3><?= __('Movies Genre') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genres_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movies_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($moviesGenre as $moviesGenre): ?>
            <tr>
                <td><?= $this->Number->format($moviesGenre->id) ?></td>
                <td><?= $moviesGenre->has('genre') ? $this->Html->link($moviesGenre->genre->id, ['controller' => 'Genres', 'action' => 'view', $moviesGenre->genre->id]) : '' ?></td>
                <td><?= $moviesGenre->has('movie') ? $this->Html->link($moviesGenre->movie->title, ['controller' => 'Movies', 'action' => 'view', $moviesGenre->movie->id]) : '' ?></td>
                <td><?= $this->Number->format($moviesGenre->created_by) ?></td>
                <td><?= $this->Number->format($moviesGenre->updated_by) ?></td>
                <td><?= h($moviesGenre->modified) ?></td>
                <td><?= h($moviesGenre->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $moviesGenre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $moviesGenre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $moviesGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moviesGenre->id)]) ?>
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
