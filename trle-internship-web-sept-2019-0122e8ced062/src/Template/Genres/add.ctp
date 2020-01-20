<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre $genre
 */

$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Genres', 'action' => 'index']],
    ['title' => 'Genres', 'url' => ['controller' => 'Genres', 'action' => 'index']],
    ['title' => 'Add', ['controller' => 'Genres']]
    ]);
?>

<div class="genres form large-9 medium-8 columns content">
    <?= $this->Form->create($genre) ?>
    <fieldset>
        <legend><?= __('Add Genre') ?></legend>
        <?php
            echo $this->Form->control('type', ['class' => 'form-group form-control col-sm-3']);
        ?>
    </fieldset>
    <?= $this->element('Form/footer', ['model' => $genre]); ?>
    <?= $this->Form->end() ?>
</div>
