<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 *  
      
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'themes/bootstrap/css/bootstrap.min.css',
        'themes/assets/css/plugins.css',
         //'themes/assets/css/loader.css',
        'themes/plugins/apex/apexcharts.css',
        'themes/assets/css/dashboard/dash_1.css',
    ];
    public $js = [
         
        
        // 'themes/assets/js/loader.js',
         'themes/bootstrap/js/popper.min.js',
         'themes/bootstrap/js/bootstrap.min.js',
         'themes/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
         'themes/assets/js/custom.js',
         'themes/plugins/apex/apexcharts.min.js',
         'themes/assets/js/dashboard/dash_1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
