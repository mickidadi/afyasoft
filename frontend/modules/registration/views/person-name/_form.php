<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PersonName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'preferred')->textInput() ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'given_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_name_prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_name2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_name_suffix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'voided')->textInput() ?>

    <?= $form->field($model, 'voided_by')->textInput() ?>

    <?= $form->field($model, 'date_voided')->textInput() ?>

    <?= $form->field($model, 'void_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
