<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TvShow[]|\Cake\Collection\CollectionInterface $tvShows
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'TvShows', 'action' => 'index']],
    ['title' => 'Tv Shows', ['controller' => 'TvShows']]
]);
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tv Shows Table
        <div class="float-right">
        <?= $this->Html->link('Add New Tv Show', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
        </div>
    </div>
    <div class="card-body">
        <?php if(!$tvShows->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
                <tfoot>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('genre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
        <tbody>
            <?php foreach ($tvShows as $tvShow): ?>
            <tr>
                <td><?= h($tvShow->title) ?></td>
                <td><?= $tvShow->genres ? current($tvShow->genres)->type : 'none' ?></td>
                <td><?= $tvShow->year ?></td>
                <td><?= $this->Number->format($tvShow->duration) ?></td>
                <td><?= h($tvShow->modified) ?></td>
                <td><?= h($tvShow->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $tvShow->id],
                        ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                            'data-title' => 'Are you sure?', 'data-message' => __('Are you sure you want to delete {0}?', $tvShow->title)]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $tvShow->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php else: echo 'No Tv Shows to show. Please add new Tv Show.'; ?>
            <?php endif; ?>
            <?= $this->element('Grid/pagination'); ?>
        </div>
    </div>
</div>



