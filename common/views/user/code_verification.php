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
?>


<!-- Password recovery -->
<?php $form =ActiveForm::begin(['id'=>'code-verification-form']); ?>
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><i class="icon-hash"></i></div>
            <!--<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>-->
            <h5 class="content-group">Password recovery <small class="display-block"><b>2/4</b> User Confirmation</small></h5>
        </div>

        <div class="form-group has-feedback" style="display: none;">
            <?= $form->field($model,'email')->textInput(['value'=>$user->email,'class'=>'form-control','placeholder'=>' Your email address'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mail5 text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback" style="display: none;">
            <?= $form->field($model,'phone')->textInput(['value'=>$user->phone,'class'=>'form-control','placeholder'=>' Your email address'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mobile text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback">
            <?php //2592 $form->field($model,'phone')->textInput(['type'=>'email','class'=>'form-control','placeholder'=>' Your phone number'])->label(false)
                                    echo $form->field($model,'code')->widget(MaskedInput::className(),
                                        [
                                            'options'=>['placeholder' => 'Your 4 digit code', 'class'=>'form-control text-bold text-size-large'],
                                            'mask' => '9999'
                                        ]
                                    )->label(false); ?>

            <div class="form-control-feedback">
                <i class="icon-hash text-muted"></i>
            </div>
        </div>

        <button type="submit" class="btn bg-blue btn-block">Submit Code <i class="icon-arrow-right14 position-right"></i></button>
    </div>
<?php ActiveForm::end();  ?>
<!-- /password recovery -->

