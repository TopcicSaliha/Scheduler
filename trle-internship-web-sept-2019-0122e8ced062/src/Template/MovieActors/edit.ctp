<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieActor $movieActor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movieActor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movieActor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movie Actors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieActors form large-9 medium-8 columns content">
    <?= $this->Form->create($movieActor) ?>
    <fieldset>
        <legend><?= __('Edit Movie Actor') ?></legend>
        <?php
            echo $this->Form->control('actors_id', ['options' => $actors]);
            echo $this->Form->control('movies_id', ['options' => $movies]);
            echo $this->Form->control('role');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
