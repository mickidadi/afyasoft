<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\ConceptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="concept-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'concept_id') ?>

    <?= $form->field($model, 'concept_name_en') ?>

    <?= $form->field($model, 'concept_name_type') ?>

    <?= $form->field($model, 'retired') ?>

    <?= $form->field($model, 'short_name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'form_text') ?>

    <?php // echo $form->field($model, 'datatype_id') ?>

    <?php // echo $form->field($model, 'class_id') ?>

    <?php // echo $form->field($model, 'is_set') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'version') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'retired_by') ?>

    <?php // echo $form->field($model, 'date_retired') ?>

    <?php // echo $form->field($model, 'retire_reason') ?>

    <?php // echo $form->field($model, 'uuid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
