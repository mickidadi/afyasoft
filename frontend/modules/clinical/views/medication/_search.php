<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\DrugQuoteLineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-drug-quote-line-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quote_line_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\BlSaleQuoteLine::find()->orderBy('quote_line_id')->asArray()->all(), 'quote_line_id', 'quote_line_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl sale quote line')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'drug_inventory_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Drug::find()->orderBy('drug_id')->asArray()->all(), 'drug_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Drug')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'dose')->textInput(['placeholder' => 'Dose']) ?>

    <?= $form->field($model, 'as_needed')->textInput(['placeholder' => 'As Needed']) ?>

    <?= $form->field($model, 'dosing_type')->textInput(['maxlength' => true, 'placeholder' => 'Dosing Type']) ?>

    <?php /* echo $form->field($model, 'quantity')->textInput(['placeholder' => 'Quantity']) */ ?>

    <?php /* echo $form->field($model, 'as_needed_condition')->textInput(['maxlength' => true, 'placeholder' => 'As Needed Condition']) */ ?>

    <?php /* echo $form->field($model, 'num_refills')->textInput(['placeholder' => 'Num Refills']) */ ?>

    <?php /* echo $form->field($model, 'dosing_instructions')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'duration')->textInput(['placeholder' => 'Duration']) */ ?>

    <?php /* echo $form->field($model, 'duration_units')->textInput(['placeholder' => 'Duration Units']) */ ?>

    <?php /* echo $form->field($model, 'quantity_units')->textInput(['placeholder' => 'Quantity Units']) */ ?>

    <?php /* echo $form->field($model, 'route')->textInput(['placeholder' => 'Route']) */ ?>

    <?php /* echo $form->field($model, 'dose_units')->textInput(['placeholder' => 'Dose Units']) */ ?>

    <?php /* echo $form->field($model, 'frequency')->textInput(['placeholder' => 'Frequency']) */ ?>

    <?php /* echo $form->field($model, 'brand_name')->textInput(['maxlength' => true, 'placeholder' => 'Brand Name']) */ ?>

    <?php /* echo $form->field($model, 'dispense_as_written')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'drug_non_coded')->textInput(['maxlength' => true, 'placeholder' => 'Drug Non Coded']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
