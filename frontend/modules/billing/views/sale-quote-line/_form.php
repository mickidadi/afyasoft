<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuoteLine */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BlDiscount', 
        'relID' => 'bl-discount', 
        'value' => \yii\helpers\Json::encode($model->blDiscounts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BlSaleQuoteReferenceMap', 
        'relID' => 'bl-sale-quote-reference-map', 
        'value' => \yii\helpers\Json::encode($model->blSaleQuoteReferenceMaps),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="bl-sale-quote-line-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

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

    <?= $form->field($model, 'quantity')->textInput(['placeholder' => 'Quantity']) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true, 'placeholder' => 'Unit']) ?>

    <?= $form->field($model, 'quoted_amount')->textInput(['placeholder' => 'Quoted Amount']) ?>

    <?= $form->field($model, 'payable_amount')->textInput(['placeholder' => 'Payable Amount']) ?>

    <?= $form->field($model, 'payment_category')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'payment_sub_category')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\BlQuoteStatusCode::find()->orderBy('status_code_id')->asArray()->all(), 'status_code_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Bl quote status code')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'BlDiscount')),
            'content' => $this->render('_formBlDiscount', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->blDiscounts),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'BlSaleOrderByQuoteLine')),
            'content' => $this->render('_formBlSaleOrderByQuoteLine', [
                'form' => $form,
                'BlSaleOrderByQuoteLine' => is_null($model->blSaleOrderByQuoteLine) ? new common\models\BlSaleOrderByQuoteLine() : $model->blSaleOrderByQuoteLine,
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'BlSaleQuoteReferenceMap')),
            'content' => $this->render('_formBlSaleQuoteReferenceMap', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->blSaleQuoteReferenceMaps),
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
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
