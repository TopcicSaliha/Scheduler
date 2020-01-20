<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EpisodeRating $episodeRating
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Episode Ratings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Episodes'), ['controller' => 'Episodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Episode'), ['controller' => 'Episodes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="episodeRatings form large-9 medium-8 columns content">
    <?= $this->Form->create($episodeRating) ?>
    <fieldset>
        <legend><?= __('Add Episode Rating') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('episodes_id', ['options' => $episodes, 'empty' => true]);
            echo $this->Form->control('action');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
