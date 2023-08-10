<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;


AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php')
?>




    <?php echo $this->render('_aside')?>
    <main class="flex-grow-1 p-4">
        <?= $content ?>
    </main>



<?php $this->endContent()?>


