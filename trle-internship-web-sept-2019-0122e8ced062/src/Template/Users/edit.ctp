<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'Users', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'Edit', ['controller' => 'Users']]
]);
?>

<div class="users form large-9 medium-8 columns content">
     <?= $this->Form->create($user) ?>
     <fieldset>
         <legend><?= __('Edit User') ?></legend>
         <?= $this->Form->control('first_name', ['class' => 'form-group form-control col-sm-3']); ?>
         <?= $this->Form->control('last_name', ['class' => 'form-group form-control col-sm-3']); ?>
         <?=$this->Form->control('email', ['class' => 'form-group form-control col-sm-3']); ?>
         <?=$this->Form->control('password', ['class' => 'form-group form-control col-sm-3']); ?>
         <div class="custom-date">
             <?=$this->Form->control('date_of_birth',  ['class' => 'form-group form-control col-sm-3 datepicker']); ?>
         </div>
         <label>Gender</label>
         <?= $this->Form->select('gender', ['male' => 'male', 'female' => 'female', 'other' => 'other'], ['class' => 'form-group form-control col-sm-2'] ); ?>
     </fieldset>
    <?= $this->element('Form/footer', ['model' => $user]); ?>
    <?= $this->Form->end() ?>
</div>




