<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php')
?>



<main class="d-flex">
    <?php echo $this->render('_aside')?>
    <div class="flex-grow-1">
        <?= $content ?>
    </div>
</main>


<?php $this->endContent()?>


