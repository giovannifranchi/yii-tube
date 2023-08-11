<?php

use yii\helpers\Html;


/** @var common\models\User $channel */
/** @var common\models\User $subscriber */
?>

<p>Hello, <?= $channel->username ?></p>

<p>You have a new subscription, follow this link to look up its profile <?= Html::channelLink($subscriber) ?></p>

<p>YII Tube Team</p>