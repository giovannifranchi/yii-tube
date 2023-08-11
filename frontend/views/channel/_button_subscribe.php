<?php

/** @var common\models\User $model */
?>


<button class="btn btn-danger btn-sm mt-3">
        Subscribe <?= $model->getSubscribers()->count() ?>
        <i class="fa-solid fa-bell"></i>
</button>