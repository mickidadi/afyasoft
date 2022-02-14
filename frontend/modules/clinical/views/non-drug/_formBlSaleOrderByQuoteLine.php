<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\BlSaleOrderByQuoteLine */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="non-drug-form">

    <?= $form->field($BlSaleOrderByQuoteLine, 'soql_no')->textInput(['placeholder' => 'Soql No']) ?>

    <?= $form->field($BlSaleOrderByQuoteLine, 'paid_amount')->textInput(['placeholder' => 'Paid Amount']) ?>

    <?= $form->field($BlSaleOrderByQuoteLine, 'debt_amount')->textInput(['placeholder' => 'Debt Amount']) ?>

    <?= $form->field($BlSaleOrderByQuoteLine, 'date_created')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Created'),
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($BlSaleOrderByQuoteLine, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) ?>

</div>
