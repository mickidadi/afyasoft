
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use backend\modules\security\SecurityModule;
Yii::$app->session['CurrentPackage'] = 100;
//AppAsset::register($this);
$requestArray = explode('/',$_SERVER['REQUEST_URI']);
if ($requestArray[2]=='staff'){ Yii::$app->controller->renderPartial('@common/views/layouts/_common_backend_use');}else{ Yii::$app->controller->renderPartial('@common/views/layouts/_common_frontend_use');}

//AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= SecurityModule::CommonAssets(); ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?= Yii::$app->controller->renderPartial('@common/views/layouts/tpl_navigation'); //Require global Top level navigation file from [common] shared layout?>

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <?php
            switch (Yii::$app->session['AccountType']){
                case 1:
                    $view = 'student_side_bar';
                    break;
                default:
                    $view = 'staff_side_bar';
                    break;
            }
            ?>
            <?php //require_once($view); ?>
            <?= Yii::$app->controller->renderPartial('@common/views/layouts/'.$view); //Require Profile side bar file from [common] shared layout?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <!--<div class="content">-->
                <div class="page-header-default">
                    <div class="breadcrumb-line breadcrumb-line-component">

                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>

                        <?php //require_once(__DIR__."/../../../../views/layouts/bread_crumb_components.php"); //Require global Breadcrumb elements file from backend general layout ?>
                        <?= Yii::$app->controller->renderPartial('@common/views/layouts/bread_crumb_components'); //Require global Breadcrumb elements file from [common] shared layout?>

                    </div>
                </div>


                <div class="content">

                    <?/*= Alert::widget(); */?>

                    <?= SecurityModule::Alert(); ?>



                    <?= $content ?>
                    <?/*= Alert::widget(); */?>
                    <?php //unset(Yii::$app->session['flashCode']); ?>

                </div>
                <!--</div>-->
                <!-- /content area -->

            </div>
            <!-- /main content -->


        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
</div>

<!--Footer-->
<?php //require_once(__DIR__."/../../../../views/layouts/footer.php"); //Require global footer file from backend general layout ?>
<?= Yii::$app->controller->renderPartial('@common/views/layouts/footer'); //Require global footer file from [common] shared layout?>
<!--/Footer-->






<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php //unset(Yii::$app->session['flashCode']); ?>
