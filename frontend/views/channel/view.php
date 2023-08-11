<?php

use frontend\assets\ChannelAsset;

ChannelAsset::register($this);

/** @var common\models\User $model */
?>


<div class="jumbotron d-flex align-items-center justify-content-center">
    <h1 class="text-decoration-underline"><?= $model->username ?></h1>
</div>