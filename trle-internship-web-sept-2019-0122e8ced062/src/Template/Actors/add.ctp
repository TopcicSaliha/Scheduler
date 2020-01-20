<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actor $actor
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Actors', 'action' => 'index']],
    ['title' => 'Actors', 'url' => ['controller' => 'Actors', 'action' => 'index']],
    ['title' => 'Add', ['controller' => 'Actors']]
]);
?>
<div class="actors form large-9 medium-8 columns content">
    <?= $this->Form->create($actor) ?>
    <fieldset>
        <legend><?= __('Add Actor') ?></legend>
        <?php
            echo $this->Form->control('name', ['class' => 'form-group form-control col-sm-3']);

        ?>
    </fieldset>
    <?= $this->element('Form/footer', ['model' => $actor]); ?>
    <?= $this->Form->end() ?>
</div>
