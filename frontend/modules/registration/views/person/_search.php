<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'birthdate') ?>

    <?= $form->field($model, 'birthdate_estimated') ?>

    <?= $form->field($model, 'dead') ?>

    <?php // echo $form->field($model, 'death_date') ?>

    <?php // echo $form->field($model, 'cause_of_death') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'voided') ?>

    <?php // echo $form->field($model, 'voided_by') ?>

    <?php // echo $form->field($model, 'date_voided') ?>

    <?php // echo $form->field($model, 'void_reason') ?>

    <?php // echo $form->field($model, 'uuid') ?>

    <?php // echo $form->field($model, 'deathdate_estimated') ?>

    <?php // echo $form->field($model, 'birthtime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
