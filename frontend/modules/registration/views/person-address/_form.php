<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'preferred')->textInput() ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_village')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'creator')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'voided')->textInput() ?>

    <?= $form->field($model, 'voided_by')->textInput() ?>

    <?= $form->field($model, 'date_voided')->textInput() ?>

    <?= $form->field($model, 'void_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'county_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_changed')->textInput() ?>

    <?= $form->field($model, 'changed_by')->textInput() ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address13')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address14')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address15')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
