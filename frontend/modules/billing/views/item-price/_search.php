<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlItemPriceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-bl-item-price-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_price_id')->textInput(['placeholder' => 'Item Price']) ?>

    <?= $form->field($model, 'price_list_version')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlPriceListVersion::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl price list version')],
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

    <?= $form->field($model, 'payment_category')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'payment_sub_category')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'selling_price')->textInput(['placeholder' => 'Selling Price']) */ ?>

    <?php /* echo $form->field($model, 'retired')->textInput(['placeholder' => 'Retired']) */ ?>

    <?php /* echo $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
