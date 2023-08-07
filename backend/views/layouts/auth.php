<?php

use backend\assets\AppAsset;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php');
?>

<main class="w-100">
    <?= $content ?>
</main>


<?php $this->endContent()?>


