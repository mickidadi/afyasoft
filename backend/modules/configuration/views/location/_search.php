<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\LocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-location-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'location_id')->textInput(['placeholder' => 'Location']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) ?>

    <?php /* echo $form->field($model, 'city_village')->textInput(['maxlength' => true, 'placeholder' => 'City Village']) */ ?>

    <?php /* echo $form->field($model, 'state_province')->textInput(['maxlength' => true, 'placeholder' => 'State Province']) */ ?>

    <?php /* echo $form->field($model, 'postal_code')->textInput(['maxlength' => true, 'placeholder' => 'Postal Code']) */ ?>

    <?php /* echo $form->field($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) */ ?>

    <?php /* echo $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) */ ?>

    <?php /* echo $form->field($model, 'longitude')->textInput(['maxlength' => true, 'placeholder' => 'Longitude']) */ ?>

    <?php /* echo $form->field($model, 'creator')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_created')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Created'),
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'county_district')->textInput(['maxlength' => true, 'placeholder' => 'County District']) */ ?>

    <?php /* echo $form->field($model, 'address3')->textInput(['maxlength' => true, 'placeholder' => 'Address3']) */ ?>

    <?php /* echo $form->field($model, 'address4')->textInput(['maxlength' => true, 'placeholder' => 'Address4']) */ ?>

    <?php /* echo $form->field($model, 'address5')->textInput(['maxlength' => true, 'placeholder' => 'Address5']) */ ?>

    <?php /* echo $form->field($model, 'address6')->textInput(['maxlength' => true, 'placeholder' => 'Address6']) */ ?>

    <?php /* echo $form->field($model, 'retired')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'retired_by')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_retired')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Retired'),
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'retire_reason')->textInput(['maxlength' => true, 'placeholder' => 'Retire Reason']) */ ?>

    <?php /* echo $form->field($model, 'parent_location')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Location::find()->orderBy('location_id')->asArray()->all(), 'location_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Location')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) */ ?>

    <?php /* echo $form->field($model, 'changed_by')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'date_changed')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Changed'),
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'address7')->textInput(['maxlength' => true, 'placeholder' => 'Address7']) */ ?>

    <?php /* echo $form->field($model, 'address8')->textInput(['maxlength' => true, 'placeholder' => 'Address8']) */ ?>

    <?php /* echo $form->field($model, 'address9')->textInput(['maxlength' => true, 'placeholder' => 'Address9']) */ ?>

    <?php /* echo $form->field($model, 'address10')->textInput(['maxlength' => true, 'placeholder' => 'Address10']) */ ?>

    <?php /* echo $form->field($model, 'address11')->textInput(['maxlength' => true, 'placeholder' => 'Address11']) */ ?>

    <?php /* echo $form->field($model, 'address12')->textInput(['maxlength' => true, 'placeholder' => 'Address12']) */ ?>

    <?php /* echo $form->field($model, 'address13')->textInput(['maxlength' => true, 'placeholder' => 'Address13']) */ ?>

    <?php /* echo $form->field($model, 'address14')->textInput(['maxlength' => true, 'placeholder' => 'Address14']) */ ?>

    <?php /* echo $form->field($model, 'address15')->textInput(['maxlength' => true, 'placeholder' => 'Address15']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
