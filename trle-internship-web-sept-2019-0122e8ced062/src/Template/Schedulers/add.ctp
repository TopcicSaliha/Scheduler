<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheduler $scheduler
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schedulers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedulers form large-9 medium-8 columns content">
    <?= $this->Form->create($scheduler) ?>
    <fieldset>
        <legend><?= __('Add Scheduler') ?></legend>
        <?php
            echo $this->Form->control('model_id');
            echo $this->Form->control('model');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('start_on');
            echo $this->Form->control('alert');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
