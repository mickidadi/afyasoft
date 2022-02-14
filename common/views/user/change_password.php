<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 6/5/19
 * Time: 1:36 AM
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use yii\widgets\ActiveForm;
?>


<!-- Password recovery -->
<?php $form =ActiveForm::begin(['id'=>'change-password-form']); ?>
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><i class="icon-key"></i></div>
            <!--<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>-->
            <h5 class="content-group">Password recovery <small class="display-block"><b>3/4</b> Change Password</small></h5>
        </div>

        <div class="form-group has-feedback" style="display: none;">
            <?= $form->field($model,'email')->passwordInput(['value'=>$user->email,'class'=>'form-control','placeholder'=>' Your email address'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mail5 text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback" style="display: none;">
            <?= $form->field($model,'phone')->passwordInput(['value'=>$user->phone,'class'=>'form-control','placeholder'=>' Your email address'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mobile text-muted"></i>
            </div>
        </div>
        <div class="form-group has-feedback" style="display: none;">
            <?= $form->field($model,'code')->passwordInput(['value'=>Yii::$app->session['current_code'],'class'=>'form-control','placeholder'=>' Your 4 digit code'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mobile text-muted"></i>
            </div>
        </div>




        <div class="form-group has-feedback">
            <?= $form->field($model,'new_password')->passwordInput(['class'=>'form-control','placeholder'=>'Type Your new password'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-key text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback">
            <?= $form->field($model,'repeat_password')->passwordInput(['class'=>'form-control','placeholder'=>'Repeat Your new password'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-key text-muted"></i>
            </div>
        </div>

        <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
    </div>
<?php ActiveForm::end();  ?>
<!-- /password recovery -->

