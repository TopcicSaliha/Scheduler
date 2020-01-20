<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TvShowsGenre $tvShowsGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tv Shows Genre'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tv Shows'), ['controller' => 'TvShows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tv Show'), ['controller' => 'TvShows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tvShowsGenre form large-9 medium-8 columns content">
    <?= $this->Form->create($tvShowsGenre) ?>
    <fieldset>
        <legend><?= __('Add Tv Shows Genre') ?></legend>
        <?php
            echo $this->Form->control('genres_id', ['options' => $genres]);
            echo $this->Form->control('tv_shows_id', ['options' => $tvShows]);
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
