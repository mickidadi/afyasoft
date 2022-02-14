<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

///use backend\modules\security\SecurityModule; logo3.png
$this->title = 'Login';
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="panel panel-body login-form">

    <div class="text-center">
        <div class="icon-object border-slate-300 text-slate-300">
       <!-- <i class="icon-reading"></i>-->
       <center>
     <img src="uploadimage/logo/2017_logo.png" class="img-responsive"    width="250px" alt="User Image">
         </center>
        </div>
        <h5 class="content-group">Login to your <small class="display-block">Your credentials</small></h5>
    </div>

    <div class="form-group has-feedback has-feedback-left">
        <!--<input type="text" class="form-control" placeholder="Username">-->
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'form-control','placeholder'=>"Username"])->label(false) ?>
        <div class="form-control-feedback">
            <i class="icon-user text-muted"></i>
        </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
        <!--<input type="text" class="form-control" placeholder="Password">-->
        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','placeholder'=>'Password'])->label(false) ?>
        <div class="form-control-feedback">
            <i class="icon-lock2 text-muted"></i>
        </div>
    </div>
 
        
    <div class="form-group login-options">
        <div class="row">
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    <!--<input type="checkbox" class="styled" checked="checked">-->
                    <?= $form->field($model, 'rememberMe')->checkbox(['type'=>'checkbox','class'=>'styled','checked'=>'checked']); ?>

                    <!--Remember-->
                </label>
            </div>

            <div class="col-sm-6 text-right">
                <a href="">Forgot password?</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Login<i class="icon-arrow-right14 position-right"></i>', ['class' => 'btn bg-blue btn-block', 'name' => 'login-button']) ?>
        <!--<button type="submit" class="">Login </button>-->
    </div>
    <div class="content-divider text-muted form-group"></div>
    <ul class="list-inline form-group list-inline-condensed text-center">
      
      <!-- <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"> <img src="logo/logo.png" style="width:70px"></a></li>
        <li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"> <img src="logo/logo.jpeg"  style="width:70px"></a></li>
        <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"> <img src="logo/logo_a.jpeg"  style="width:70px"></a></li>-->
       
    </ul>
     
 


<?php ActiveForm::end(); ?>

</div>
