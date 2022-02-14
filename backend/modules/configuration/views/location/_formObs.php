<div class="form-group" id="add-obs">
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
    'formName' => 'Obs',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'obs_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'person_id' => [
            'label' => 'Person',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Person::find()->orderBy('person_id')->asArray()->all(), 'person_id', 'person_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Person')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'concept_id' => [
            'label' => 'Concept',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'encounter_id' => ['type' => TabularForm::INPUT_TEXT],
        'order_id' => [
            'label' => 'Orders',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Orders::find()->orderBy('order_id')->asArray()->all(), 'order_id', 'order_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Orders')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'obs_datetime' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Obs Datetime'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'obs_group_id' => [
            'label' => 'Obs',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Obs::find()->orderBy('obs_id')->asArray()->all(), 'obs_id', 'obs_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Obs')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'accession_number' => ['type' => TabularForm::INPUT_TEXT],
        'value_group_id' => ['type' => TabularForm::INPUT_TEXT],
        'value_coded' => [
            'label' => 'Concept',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'value_coded_name_id' => ['type' => TabularForm::INPUT_TEXT],
        'value_drug' => [
            'label' => 'Drug',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Drug::find()->orderBy('name')->asArray()->all(), 'drug_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Drug')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'value_datetime' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Value Datetime'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'value_numeric' => ['type' => TabularForm::INPUT_TEXT],
        'value_modifier' => ['type' => TabularForm::INPUT_TEXT],
        'value_text' => ['type' => TabularForm::INPUT_TEXTAREA],
        'value_complex' => ['type' => TabularForm::INPUT_TEXT],
        'comments' => ['type' => TabularForm::INPUT_TEXT],
        'creator' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => Yii::t('app', 'Choose User')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'date_created' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Date Created'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'voided' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'voided_by' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => Yii::t('app', 'Choose User')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'date_voided' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Date Voided'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'void_reason' => ['type' => TabularForm::INPUT_TEXT],
        'uuid' => ['type' => TabularForm::INPUT_TEXT],
        'previous_version' => [
            'label' => 'Obs',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Obs::find()->orderBy('obs_id')->asArray()->all(), 'obs_id', 'obs_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Obs')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'form_namespace_and_path' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_TEXT],
        'interpretation' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowObs(' . $key . '); return false;', 'id' => 'obs-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Obs'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowObs()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

