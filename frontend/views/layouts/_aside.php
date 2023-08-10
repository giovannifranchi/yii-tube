<?php
use yii\bootstrap5\Nav;

?>


<aside class="shadow" style="width: 200px;">
    <?php

    echo Nav::widget([
        'options'=> ['class'=> 'd-flex flex-column nav-pills'],
        'items'=> [
            ['label'=> 'Dashboard', 'url'=>['/site/index'],],
            ['label'=> 'Videos', 'url'=>['/video/index']],
        ]
    ])



    ?>
    
</aside>