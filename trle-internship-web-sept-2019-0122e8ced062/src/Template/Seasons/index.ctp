<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season[]|\Cake\Collection\CollectionInterface $seasons
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Seasons', 'action' => 'index']],
    ['title' => 'Seasons', ['controller' => 'Seasons']]
]);
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Seasons Table
        <div class="float-right">
            <?= $this->Html->link('Add New Season', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
        </div>
    </div>
        <div class="card-body">
            <?php if(!$seasons->isEmpty()): ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tv_shows_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
                    <tfoot>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('tv_shows_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                    </tr>
                    </tfoot>
        <tbody>
            <?php foreach ($seasons as $season): ?>
            <tr>
                <td><?= $season->has('tv_show') ? $this->Html->link($season->tv_show->title, [$season->tv_show->id]) : '' ?></td>
                <td><?= h($season->title) ?></td>
                <td><?= $season->year ?></td>
                <td><?= h($season->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $season->id],
                        ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                            'data-title' => 'Are you sure?', 'data-message' => __('Are you sure you want to delete {0}?', $season->title)]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $season->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                <?php else: echo 'No seasons to show. Please add new season.'; ?>
                <?php endif; ?>
                <?= $this->element('Grid/pagination'); ?>
            </div>
        </div>
    </div>
