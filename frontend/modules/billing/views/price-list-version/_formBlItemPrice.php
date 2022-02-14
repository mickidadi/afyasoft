<div class="form-group" id="add-bl-item-price">
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
    'formName' => 'BlItemPrice',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'item_price_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'item' => ['type' => TabularForm::INPUT_TEXT],
        'service_type' => [
            'label' => 'Bl service type',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\BlServiceType::find()->orderBy('name')->asArray()->all(), 'service_type_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bl service type')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'payment_category' => [
            'label' => 'Concept',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'payment_sub_category' => [
            'label' => 'Concept',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'selling_price' => ['type' => TabularForm::INPUT_TEXT],
        'retired' => ['type' => TabularForm::INPUT_TEXT],
        'uuid' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowBlItemPrice(' . $key . '); return false;', 'id' => 'bl-item-price-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Bl Item Price'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowBlItemPrice()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

