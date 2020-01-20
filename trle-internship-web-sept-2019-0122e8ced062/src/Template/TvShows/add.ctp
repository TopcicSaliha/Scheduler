<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TvShow $tvShow
 * @var array $genres
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'TvShows', 'action' => 'index']],
    ['title' => 'Tv Shows', 'url' => ['controller' => 'TvShows', 'action' => 'index']],
    ['title' => 'Add', ['controller' => 'TvShows']]
]);
?>
<div class="tvShows form large-9 medium-8 columns content">
    <?= $this->Form->create($tvShow) ?>
    <fieldset>
        <legend><?= __('Add Tv Show') ?></legend>
        <?php
            echo $this->Form->control('title', ['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('genre', ['options' => $genres, 'class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('description', ['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('year', ['class' => 'form-group form-control col-sm-1']);
            echo $this->Form->control('duration', ['class' => 'form-group form-control col-sm-1']);
            echo $this->Form->control('cover', ['class' => 'form-group form-control col-sm-1']);
        ?>
    </fieldset>
    <?= $this->element('Form/footer', ['model' => $tvShow]); ?>
    <?= $this->Form->end() ?>
</div>
