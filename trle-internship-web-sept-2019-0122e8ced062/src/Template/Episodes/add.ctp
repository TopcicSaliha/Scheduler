<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episode $episode
 * @var array $seasons
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Episodes', 'action' => 'index']],
    ['title' => 'Episodes', 'url' => ['controller' => 'Episodes', 'action' => 'index']],
    ['title' => 'Add', ['controller' => 'Episodes']]
]);
?>
<div class="episodes form large-9 medium-8 columns content">
    <?= $this->Form->create($episode) ?>
    <fieldset>
        <legend><?= __('Add Episode') ?></legend>
        <?php
            echo $this->Form->control('seasons_id', ['options' => $seasons, 'class' => 'form-group form-control col-sm-1']);
            echo $this->Form->control('title', ['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('description', ['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('duration', ['class' => 'form-group form-control col-sm-1']);
        ?>
    </fieldset>
    <?= $this->element('Form/footer', ['model' => $episode]); ?>
    <?= $this->Form->end() ?>
</div>
