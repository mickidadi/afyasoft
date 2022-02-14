<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleQuoteLineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-bl-sale-quote-line-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quote_line_id')->textInput(['placeholder' => 'Quote Line']) ?>

    <?= $form->field($model, 'sale_quote')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlSaleQuote::find()->orderBy('quote_id')->asArray()->all(), 'quote_id', 'quote_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl sale quote')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'item')->textInput(['placeholder' => 'Item']) ?>

    <?= $form->field($model, 'service_type')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlServiceType::find()->orderBy('service_type_id')->asArray()->all(), 'service_type_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl service type')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'item_price')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlItemPrice::find()->orderBy('item_price_id')->asArray()->all(), 'item_price_id', 'item_price_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl item price')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'quantity')->textInput(['placeholder' => 'Quantity']) */ ?>

    <?php /* echo $form->field($model, 'unit')->textInput(['maxlength' => true, 'placeholder' => 'Unit']) */ ?>

    <?php /* echo $form->field($model, 'quoted_amount')->textInput(['placeholder' => 'Quoted Amount']) */ ?>

    <?php /* echo $form->field($model, 'payable_amount')->textInput(['placeholder' => 'Payable Amount']) */ ?>

    <?php /* echo $form->field($model, 'payment_category')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'payment_sub_category')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlQuoteStatusCode::find()->orderBy('status_code_id')->asArray()->all(), 'status_code_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl quote status code')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'dose')->textInput(['placeholder' => 'Dose']) */ ?>

    <?php /* echo $form->field($model, 'dose_units')->textInput(['placeholder' => 'Dose Units']) */ ?>

    <?php /* echo $form->field($model, 'duration')->textInput(['placeholder' => 'Duration']) */ ?>

    <?php /* echo $form->field($model, 'duration_units')->textInput(['placeholder' => 'Duration Units']) */ ?>

    <?php /* echo $form->field($model, 'route')->textInput(['placeholder' => 'Route']) */ ?>

    <?php /* echo $form->field($model, 'frequency')->textInput(['placeholder' => 'Frequency']) */ ?>

    <?php /* echo $form->field($model, 'comment')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
