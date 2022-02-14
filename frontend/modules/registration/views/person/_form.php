<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthdate')->textInput() ?>

    <?= $form->field($model, 'birthdate_estimated')->textInput() ?>

    <?= $form->field($model, 'dead')->textInput() ?>

    <?= $form->field($model, 'death_date')->textInput() ?>

    <?= $form->field($model, 'cause_of_death')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'voided')->textInput() ?>

    <?= $form->field($model, 'voided_by')->textInput() ?>

    <?= $form->field($model, 'date_voided')->textInput() ?>

    <?= $form->field($model, 'void_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deathdate_estimated')->textInput() ?>

    <?= $form->field($model, 'birthtime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
