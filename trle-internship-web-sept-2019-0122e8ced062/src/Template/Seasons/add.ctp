<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 * @var array $tvShows
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Seasons', 'action' => 'index']],
    ['title' => 'Seasons', 'url' => ['controller' => 'Seasons', 'action' => 'index']],
    ['title' => 'Add', ['controller' => 'Seasons']]
]);
?>
<div class="seasons form large-9 medium-8 columns content">
    <?= $this->Form->create($season) ?>
    <fieldset>
        <legend><?= __('Add Season') ?></legend>
        <?php
            echo $this->Form->control('tv_shows_id', ['options' => $tvShows, 'class' => 'form-group form-control col-sm-1']);
            echo $this->Form->control('title',['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('year',['class' => 'form-group form-control col-sm-1']);
        ?>
    </fieldset>
    <?= $this->element('Form/footer', ['model' => $season]); ?>
    <?= $this->Form->end() ?>
</div>
