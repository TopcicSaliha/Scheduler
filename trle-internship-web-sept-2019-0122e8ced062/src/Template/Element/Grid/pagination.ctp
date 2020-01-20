<?php $this->Paginator->templates([
    'nextActive' => '<li class="paginate_button page-item next"><a rel="next" class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevActive' => '<li class="paginate_button page-item previous"><a rel="prev" class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="paginate_button page-item next disabled"><a rel="next" class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="paginate_button page-item previous disabled"><a rel="prev" class="page-link" href="{{url}}">{{text}}</a></li>',
    'number' => '<li class="paginate_button page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="paginate_button page-item active"><a class="page-link">{{text}}</a></li>',
]);
?>
<?php if ($this->Paginator->hasPage(2)) { ?>
<div class="paginator float-right mr-4">
    <ul class="pagination">
        <?= $this->Paginator->prev( __('Previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Next')) ?>
    </ul>
</div>
<?php } ?>







