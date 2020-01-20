<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoviesGenre $moviesGenre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $moviesGenre->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $moviesGenre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movies Genre'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="moviesGenre form large-9 medium-8 columns content">
    <?= $this->Form->create($moviesGenre) ?>
    <fieldset>
        <legend><?= __('Edit Movies Genre') ?></legend>
        <?php
            echo $this->Form->control('genres_id', ['options' => $genres]);
            echo $this->Form->control('movies_id', ['options' => $movies]);
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
