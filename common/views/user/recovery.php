<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 6/5/19
 * Time: 2:06 AM
 */
//
use yii\helpers\Html;
use backend\modules\security\SecurityModule;
?>

<div class="panel panel-body login-form">
    <div class="text-center">
        <div class="icon-object border-success-800 text-success-800"><i class="icon-checkmark4"></i></div>

        <h5 class="content-group">Password Recovered Successfully <small class="display-block"><b>4/4</b> New Password acquired</small></h5>
    </div>

    <p class="text-size-large"><b>Congratulations!</b> You've successfully changed your password. You can now login to your <b><?= Yii::$app->name; ?></b> account using your newly created password!</p>

    <a href="<?= SecurityModule::AutoUrl('login'); ?>" class="btn bg-blue btn-block">Login<i class="icon-arrow-right14 position-right"></i></a>
</div>
