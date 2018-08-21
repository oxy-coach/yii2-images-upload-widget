<?php
namespace oxycoach\imageswidget;

class ImagesUploadAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/oxy-coach/yii2-images-upload-widget/assets';

    public $css = [
        'css/main.css'
    ];

    public $js = [
        'js/main.js'
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];
}