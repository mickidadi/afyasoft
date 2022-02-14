<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\PersonNameSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-name-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'person_name_id') ?>

    <?= $form->field($model, 'preferred') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'prefix') ?>

    <?= $form->field($model, 'given_name') ?>

    <?php // echo $form->field($model, 'middle_name') ?>

    <?php // echo $form->field($model, 'family_name_prefix') ?>

    <?php // echo $form->field($model, 'family_name') ?>

    <?php // echo $form->field($model, 'family_name2') ?>

    <?php // echo $form->field($model, 'family_name_suffix') ?>

    <?php // echo $form->field($model, 'degree') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'voided') ?>

    <?php // echo $form->field($model, 'voided_by') ?>

    <?php // echo $form->field($model, 'date_voided') ?>

    <?php // echo $form->field($model, 'void_reason') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'uuid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
