<?php


namespace app\assets;


use yii\web\AssetBundle;

class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site2.css',
    ];
    public $js = [
        'js/script2.js',
    ];
}