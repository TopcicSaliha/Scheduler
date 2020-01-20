<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 * @var array $genres
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Movies', 'action' => 'index']],
    ['title' => 'Movies', 'url' => ['controller' => 'Movies', 'action' => 'index']],
    ['title' => 'Add', ['controller' => 'Movies']]
]);
?>
<div class="movies form large-9 medium-8 columns content">
    <?= $this->Form->create($movie) ?>
    <fieldset>
        <legend><?= __('Add Movie') ?></legend>
        <?php
            echo $this->Form->control('title', ['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('genre', ['options' => $genres, 'class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('description', ['class' => 'form-group form-control col-sm-3']);
            echo $this->Form->control('year', ['class' => 'form-group form-control col-sm-1']);
            echo $this->Form->control('duration', ['class' => 'form-group form-control col-sm-1']);
            echo $this->Form->control('cover', ['class' => 'form-group form-control col-sm-3']);
        ?>
    </fieldset>
    <?= $this->element('Form/footer', ['model' => $movie]); ?>
    <?= $this->Form->end() ?>
</div>
