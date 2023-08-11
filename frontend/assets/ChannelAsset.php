<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ChannelAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/channel.css',
    ];
}