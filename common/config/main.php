<?php
use kartik\mpdf\Pdf;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Africa/Dar_es_Salaam',
   // 'language' => 'sw',
       'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
           
        ],
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module'
        ],
     'gridview' => [
      'class' => '\kartik\grid\Module',
      ]
    ],
    'components' => [
        'request' => [
            'enableCsrfValidation' => false,
        ],
        'formatter' => [
            //'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
         'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
          'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
        'pdf' => [
        'class' => Pdf::classname(),
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'destination' => Pdf::DEST_BROWSER,
        // refer settings section for all configuration options
    ],
    'i18n' => [
        'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                 'basePath' => '@common/messages',
                 //'sourceLanguage' => 'sw',
                'fileMap' => [
                    'app' => 'app.php',
                    'app/error' => 'error.php',
                ],
            ],
        ],
    ],
    'as beforeRequest' => [
    'class' => 'yii\filters\AccessControl',
    'rules' => [
        [
            'actions' => ['login', 'error'],
            'allow' => true,
        ],
        [

            'allow' => true,
            'roles' => ['@'],
        ],
    ],
    ],
    ],
    /*'as beforeRequest'=>[
         // 'class'=>'\common\models\user',
    ],*/
  
];