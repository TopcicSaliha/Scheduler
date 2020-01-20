<?php
use Cake\ORM\Entity;
/**
 * @var Entity $model
 */
 ?>
<hr>
<div class="inline">
<?= $this->Form->submit('Submit', ['class' => 'btn btn-primary float-right mr-3']) ?>
        <?php if($model->modified == true) : ?>
            <p class="text-muted">Last updated on <?= $model->modified->format('d-m-Y H:i:s') ?> </p>
        <?php endif; ?>
</div>



