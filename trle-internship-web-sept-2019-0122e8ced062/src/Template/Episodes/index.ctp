<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episode[]|\Cake\Collection\CollectionInterface $episodes
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Episodes', 'action' => 'index']],
    ['title' => 'Episodes', ['controller' => 'Episodes']]
]);
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Episodes Table
        <div class="float-right">
            <?= $this->Html->link('Add New Episode', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
        </div>
    </div>
    <div class="card-body">
        <?php if(!$episodes->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('seasons_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
                <tfoot>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('seasons_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
        <tbody>
            <?php foreach ($episodes as $episode): ?>
            <tr>
                <td><?= $episode->has('season') ? $this->Html->link($episode->season->title, ['controller' => 'Seasons', 'action' => 'view', $episode->season->id]) : '' ?></td>
                <td><?= h($episode->title) ?></td>
                <td><?= $this->Number->format($episode->duration) ?></td>
                <td><?= h($episode->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $episode->id],
                        ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                            'data-title' => 'Are you sure?', 'data-message' => __("Are you sure you want to delete {0}?", $episode->title)]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $episode->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php else: echo 'No episodes to show. Please add new episode.'; ?>
            <?php endif; ?>
            <?= $this->element('Grid/pagination'); ?>
        </div>
    </div>
</div>
