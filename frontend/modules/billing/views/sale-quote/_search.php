<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleQuoteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-bl-sale-quote-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quote_id')->textInput(['placeholder' => 'Quote']) ?>

    <?= $form->field($model, 'patient')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Patient::find()->orderBy('patient_id')->asArray()->all(), 'patient_id', 'patient_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Patient')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'visit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Visit::find()->orderBy('visit_id')->asArray()->all(), 'visit_id', 'visit_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Visit')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'total_quote')->textInput(['placeholder' => 'Total Quote']) ?>

    <?= $form->field($model, 'payable_amount')->textInput(['placeholder' => 'Payable Amount']) ?>

    <?php /* echo $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlQuoteStatusCode::find()->orderBy('status_code_id')->asArray()->all(), 'status_code_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl quote status code')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'discounted')->textInput(['placeholder' => 'Discounted']) */ ?>

    <?php /* echo $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
