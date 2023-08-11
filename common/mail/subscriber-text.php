<?php

use yii\helpers\Html;


/** @var common\models\User $channel */
/** @var common\models\User $subscriber */
?>

Hello, <?= $channel->username ?>

You have a new subscription, follow this link to look up its profile <?= Html::channelLink($subscriber) ?>

YII Tube Team