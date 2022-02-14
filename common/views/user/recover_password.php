<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 5/20/19
 * Time: 8:24 AM
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use yii\widgets\ActiveForm;
use backend\modules\security\SecurityModule;

$blockerArray = [];
if (SecurityModule::UserInfo(Yii::$app->session["current_id"],"email")){ $blockerArray = ['readonly'=>'readonly'];}

?>


<!-- Password recovery -->
<?php $form =ActiveForm::begin(['id'=>'recovery-form']); ?>
<!--<form action="index.html">-->
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
            <!--<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>-->
            <h5 class="content-group">Password recovery <small class="display-block"><b>1/4</b> User information verification</small></h5>
        </div>

        <div class="form-group has-feedback">
            <?= $form->field($model,'email')->textInput(array_merge($blockerArray,['value'=>SecurityModule::UserInfo(Yii::$app->session["current_id"],"email"),'type'=>'email','class'=>'form-control','placeholder'=>' Your email address']))->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mail5 text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback">
            <?php                   echo $form->field($model,'phone')->widget(MaskedInput::className(),
                                        [
                                            'options'=>array_merge($blockerArray,['value'=>SecurityModule::UserInfo(Yii::$app->session["current_id"],"phone"),'placeholder' => 'Your phone number', 'class'=>'form-control']),
                                            'mask' => '255999999999'
                                        ]
                                    )->label(false); ?>

            <div class="form-control-feedback">
                <i class="icon-mobile text-muted"></i>
            </div>
        </div>

        <button type="submit" class="btn bg-blue btn-block">Submit Information <i class="icon-arrow-right14 position-right"></i></button>
    </div>
<?php ActiveForm::end();  ?>
<!--</form>-->
<!-- /password recovery -->

