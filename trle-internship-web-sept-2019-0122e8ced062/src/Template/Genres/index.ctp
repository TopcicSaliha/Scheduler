<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre[]|\Cake\Collection\CollectionInterface $genres
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Genres', 'action' => 'index']],
    ['title' => 'Genres', ['controller' => 'Genres']]
]);
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Genres Table
        <div class="float-right">
        <?= $this->Html->link('Add New Genre', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
        </div>
    </div>
    <div class="card-body">
        <?php if(!$genres->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
                <tfoot>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
        <tbody>
            <?php foreach ($genres as $genre): ?>
            <tr>
                <td><?= h($genre->type) ?></td>
                <td><?= h($genre->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $genre->id],
                        ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                            'data-title' => 'Are you sure?', 'data-message' => __('Are you sure you want to delete {0}?', $genre->type)]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $genre->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php else: echo 'No genres to show. Please add new genre.'; ?>
            <?php endif; ?>
            <?= $this->element('Grid/pagination'); ?>
        </div>
    </div>
</div>
