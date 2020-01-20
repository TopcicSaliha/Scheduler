<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
$this->Breadcrumbs->add([
    ['title' => 'Dashboard', 'url' => ['controller' => 'Movies', 'action' => 'index']],
    ['title' => 'Movies', ['controller' => 'Movies']]
]);
?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Movies Table
        <div class="float-right">
            <?= $this->Html->link('Add New Movie', ['action' => 'add'], ['class' =>'fas fa-plus-circle mr-2']) ?></li>
        </div>
    </div>
    <div class="card-body">
        <?php if(!$movies->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('genre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
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
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($movies as $movie): ?>

                    <tr>
                        <td><?= h($movie->title) ?></td>
                        <td><?= $movie->genres ? current($movie->genres)->type : 'none' ?></td>
                        <td><?= $movie->year ?></td>
                        <td><?= $this->Number->format($movie->duration) ?></td>
                        <td><?= h($movie->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-trash float-right"></i>', ['action' => 'delete', $movie->id],
                                ['escape' => false, 'class' => 'bootbox-confirm', 'data-confirm-text' => 'Yes', 'data-cancle-text' => 'No',
                                    'data-title' => 'Are you sure?', 'data-message' => __("Are you sure you want to delete {0}?", $movie->title)]) ?>
                            <?= $this->Html->link(__(''), ['action' => 'edit', $movie->id], ['class' => 'fas fa-edit float-right mr-3']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
       <?php else: echo 'No movies to show. Please add new movie.'; ?>
       <?php endif; ?>

            <?= $this->element('Grid/pagination'); ?>
        </div>
    </div>
</div>

