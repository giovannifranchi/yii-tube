<?php

namespace backend\assets;

use yii\web\AssetBundle;


class TagsInputAsset extends AssetBundle 
{
    
    public $basePath = '@webroot/tagsinput';
    public $baseUrl = '@web/tagsinput';
    public $css = [
        'https://unpkg.com/@yaireo/tagify/dist/tagify.css'
    ];
    public $js = [
        'https://unpkg.com/@yaireo/tagify',
        'https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js',
        'tagsinput.js'
    ];
}