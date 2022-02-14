<div class="form-group" id="add-bl-sale-quote-line">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'BlSaleQuoteLine',
    'checkboxColumn' => true,
    'actionColumn' => false,
    ['class' => 'yii\grid\CheckboxColumn'],
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'quote_line_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'item' => ['type' => TabularForm::INPUT_TEXT],
        'service_type' => [
            'label' => 'Bl service type',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\BlServiceType::find()->orderBy('name')->asArray()->all(), 'service_type_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bl service type')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'item_price' => [
            'label' => 'Bl item price',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\BlItemPrice::find()->orderBy('item_price_id')->asArray()->all(), 'item_price_id', 'item_price_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bl item price')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'quantity' => ['type' => TabularForm::INPUT_TEXT],
        'unit' => ['type' => TabularForm::INPUT_TEXT],
        'quoted_amount' => ['type' => TabularForm::INPUT_TEXT],
        'payable_amount' => ['type' => TabularForm::INPUT_TEXT],
        'payment_category' => [
            'label' => 'Concept',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'payment_sub_category' => [
            'label' => 'Concept',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'status' => [
            'label' => 'Bl quote status code',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\BlQuoteStatusCode::find()->orderBy('name')->asArray()->all(), 'status_code_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bl quote status code')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'uuid' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowBlSaleQuoteLine(' . $key . '); return false;', 'id' => 'bl-sale-quote-line-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Bl Sale Quote Line'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowBlSaleQuoteLine()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

