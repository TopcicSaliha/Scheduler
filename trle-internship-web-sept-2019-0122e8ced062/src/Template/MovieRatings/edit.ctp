<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MovieRating $movieRating
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movieRating->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movieRating->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movieRatings form large-9 medium-8 columns content">
    <?= $this->Form->create($movieRating) ?>
    <fieldset>
        <legend><?= __('Edit Movie Rating') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('movies_id', ['options' => $movies]);
            echo $this->Form->control('action');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
