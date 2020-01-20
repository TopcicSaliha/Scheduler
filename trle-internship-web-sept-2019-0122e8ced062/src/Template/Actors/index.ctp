<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actor[]|\Cake\Collection\CollectionInterface $actors
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Actors', 'action' => 'index']],
    ['title' => 'Actors', ['controller' => 'Actors']]
]);
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Actors Table
      <div class="float-right">
        <?= $this->Html->link('Add New Actor', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
      </div>
      </div>
    <div class="card-body">
        <?php if(!$actors->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
                <tfoot>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
        <tbody>
            <?php foreach ($actors as $actor): ?>
            <tr>
                <td><?= h($actor->name) ?></td>
                <td><?= h($actor->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $actor->id],
                        ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                            'data-title' => 'Are you sure?', 'data-message' => __('Are you sure you want to delete {0}?', $actor->name)]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $actor->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php else: echo 'No actors to show. Please add new actors.'; ?>
            <?php endif; ?>
            <?= $this->element('Grid/pagination'); ?>
        </div>
    </div>
</div>
