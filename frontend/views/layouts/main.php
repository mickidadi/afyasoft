<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Alert;
$bundle = yiister\gentelella\assets\Asset::register($this);
$fullname="";
?>
 <?php
      if (!\Yii::$app->user->isGuest) {
     
       $imagename= 'image/no_photo2.png';
                 
      }
   
    ?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="themes/plugins/sweetalerts/promise-polyfill1s.js"></script>
    <link href="themes/plugins/sweetalerts/sweetalert21s.min22.css" rel="stylesheet" type="text/css" />
    <link href="themes/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="themes/assets/css/components/custom-sweetalert1222.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .profile_pic {
    width: 90%!important;
    float: left;
}
  </style>
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><img src="uploadimage/logo/logo_1.png"  width="40px"> <span>AfyaPlus</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic1">
                     
                    <img src="images/logo/no_photo2.png" class="img-circle profile_img" alt="logo" width="120px" title="School Logo">          
                    
                    </div>
                    <div class="profile_info1">
                     
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />
              
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3></h3>
                        <?=\yiister\gentelella\widgets\Menu::widget(

                            [
                         "items" => [
                         ["label" => "Home", "url" => ["/site/index"], "icon" => "home"],
                        // ["label" => "My Profile", "url" => ["/students/student/profile"],'visible' => yii::$app->user->can("/students/student/profile"),'active' =>Yii::$app->controller->id == 'student'&&(Yii::$app->controller->action->id == 'profile'||Yii::$app->controller->action->id =='view-result'), "icon" => "user"],
                         ["label" => "Registration", "url" => ["/registration/patient/index"], "icon" => "users",'active' =>Yii::$app->controller->id == 'patient'],
                         ["label" => "Clinical", "url" => ["/clinical/clinical/index"], "icon" => "money",'active' =>Yii::$app->controller->id == 'clinical'],
                         //["label" => "Billing", "url" => ["/billing/default/index"], "icon" => "money",'active' =>Yii::$app->controller->id == 'default'],
                         ["label" => "Billing", "icon" => "money", "url" => "#",
                          "items" => [
                            ["label" => "Dashboard", "url" => Url::to(['/billing/default/index']), 'active' => (Yii::$app->controller->id == 'default')],
                            ["label" => "Pending Quotes", "url" => Url::to(['/billing/sale-quote/index']), 'active' => (Yii::$app->controller->id == 'sale-quote')],
                            ["label" => "Pending Orders", "url" => Url::to(['/billing/sale-orders/index']), 'active' => (Yii::$app->controller->id == 'sale-orders'&&(Yii::$app->controller->action->id =="index"))],
                            ["label" => "All Orders", "url" => Url::to(['/billing/sale-orders/order-index']), 'active' => (Yii::$app->controller->id == 'sale-orders'&&(Yii::$app->controller->action->id =="order-index" ))],
                          
                           ["label" => "Setting", "icon" => "gears", "url" => "#", "items" => [
                            ["label" => "Financial Period", "url" => Url::to(['/billing/financial-period/index']), 'active' => (Yii::$app->controller->id == 'financial-period')],
                            ["label" => "Price List Version", "url" => Url::to(['/billing/price-list-version/index']), 'active' => (Yii::$app->controller->id == 'price-list-version')],
                            ["label" => "Price List", "url" => Url::to(['/billing/item-price/index']), 'active' => (Yii::$app->controller->id == 'item-price')],
                            ["label" => "All Orders", "url" => Url::to(['/billing/sale-orders/order-index']), 'active' => (Yii::$app->controller->id == 'sale-orders'&&(Yii::$app->controller->action->id =="order-index" ))],
                            ["label" => "Excel", "url" => ["report/test"], 'active' => (Yii::$app->controller->action->id == 'report')],
                        
                        ]
                        ]
                        ],
                       
                        ],
                       
                    ],
                     ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                <?= Html::a(
                                                    '',
                                                    ['/site/logout'],
                                                    ['data-method' => 'post','class'=>'glyphicon glyphicon-off']
                                                ) ?>
                   
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?=$imagename?>" alt=""><?=$fullname?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?= Yii::$app->urlManager->createUrl('students/student/profile')?>"> My Profile</a>
                                </li>
                             
                                <li>
                                 
                                <?= Html::a(
                                                    'Sign out',
                                                    ['/site/logout'],
                                                    ['data-method' => 'post','class'=>'fa fa-sign-out pull-right']
                                                ) ?>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <a href="<?= Yii::$app->urlManager->createUrl('students/student/message')?>"> <li>
                                    <div class="text-center">
                                        
                                            <strong>See All</strong>
                                            <i class="fa fa-angle-right"></i>
                                 
                                    </div>
                                </li>
                                </a>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
              AfyaPlus<a href="https://shuleapp.com" rel="nofollow" target="_blank"> Powered by Lemon Data Technology</a><br />
                
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<script src="themes/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="themes/plugins/sweetalerts/custom-sweetalert2.js"></script>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
