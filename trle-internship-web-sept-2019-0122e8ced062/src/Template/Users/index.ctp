<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'Users', ['controller' => 'Users']]
]);
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Users Table
        <div class="float-right">
            <?= $this->Html->link('Add New User', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
        </div>
    </div>
    <div class="card-body">
        <?php if(!$users->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
                <tfoot>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->date_of_birth)?></td>
                <td><?= h($user->gender) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $user->id],
                        ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                            'data-title' => 'Are you sure?', 'data-message' => __('Are you sure you want to delete {0}?', $user->first_name)]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php else: echo 'No users to show. Please add new user.'; ?>
            <?php endif; ?>
            <?= $this->element('Grid/pagination'); ?>
        </div>
    </div>
</div>



