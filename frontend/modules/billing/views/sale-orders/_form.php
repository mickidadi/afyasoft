<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleOrders */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BlSaleOrdersLine', 
        'relID' => 'bl-sale-orders-line', 
        'value' => \yii\helpers\Json::encode($model->blSaleOrdersLines),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="bl-sale-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'order_id')->textInput(['placeholder' => 'Order']) ?>

    <?= $form->field($model, 'patient_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Patient::find()->orderBy('patient_id')->asArray()->all(), 'patient_id', 'patient_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Patient')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'visit_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Visit::find()->orderBy('visit_id')->asArray()->all(), 'visit_id', 'visit_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Visit')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'total_quote')->textInput(['placeholder' => 'Total Quote']) ?>

    <?= $form->field($model, 'payable_amount')->textInput(['placeholder' => 'Payable Amount']) ?>

    <?= $form->field($model, 'status')->textInput(['placeholder' => 'Status']) ?>

    <?= $form->field($model, 'discounted')->textInput(['placeholder' => 'Discounted']) ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'BlSaleOrdersLine')),
            'content' => $this->render('_formBlSaleOrdersLine', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->blSaleOrdersLines),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
