<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TvShowActor $tvShowActor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tvShowActor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tvShowActor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tv Show Actors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tv Shows'), ['controller' => 'TvShows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tv Show'), ['controller' => 'TvShows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tvShowActors form large-9 medium-8 columns content">
    <?= $this->Form->create($tvShowActor) ?>
    <fieldset>
        <legend><?= __('Edit Tv Show Actor') ?></legend>
        <?php
            echo $this->Form->control('actors_id', ['options' => $actors]);
            echo $this->Form->control('tv_shows_id', ['options' => $tvShows]);
            echo $this->Form->control('role');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
