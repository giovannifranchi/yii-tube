<?php

/** @var yii\web\View $this */
/** @var common\models\Video $latestVideo */
/** @var int $totalViews */
/** @var int $totalSubscribers */
/** @var common\models\Subscriber $latestSubscribers */
?>


<?= $latestVideo->title ?>

<?= $totalViews ?>

<?= $totalSubscribers ?> 

<?php foreach($latestSubscribers as $subscriber): ?>

    <?= $subscriber->subscriber->username ?>

<?php endforeach; ?>


