<div class="form-group" id="add-bl-sale-orders-line">
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
    'formName' => 'BlSaleOrdersLine',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'order_line_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'sale_quote_line_id' => [
            'label' => 'Bl sale quote line',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\BlSaleQuoteLine::find()->orderBy('quote_line_id')->asArray()->all(), 'quote_line_id', 'quote_line_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bl sale quote line')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'payment_status' => ['type' => TabularForm::INPUT_TEXT],
        'payment_method' => ['type' => TabularForm::INPUT_TEXT],
        'uuid' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowBlSaleOrdersLine(' . $key . '); return false;', 'id' => 'bl-sale-orders-line-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Bl Sale Orders Line'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowBlSaleOrdersLine()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

