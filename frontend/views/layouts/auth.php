<?php

use frontend\assets\AppAsset;

AppAsset::register($this);
$this->beginContent('@frontend/views/layouts/base.php');
?>

<main class="w-100">
    <?= $content ?>
</main>


<?php $this->endContent()?>
