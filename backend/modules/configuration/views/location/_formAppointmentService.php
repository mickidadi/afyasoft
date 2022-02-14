<div class="form-group" id="add-appointment-service">
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
    'formName' => 'AppointmentService',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'appointment_service_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'description' => ['type' => TabularForm::INPUT_TEXTAREA],
        'start_time' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Start Time'),
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'end_time' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose End Time'),
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'speciality_id' => [
            'label' => 'Appointment speciality',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\AppointmentSpeciality::find()->orderBy('name')->asArray()->all(), 'speciality_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Appointment speciality')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'max_appointments_limit' => ['type' => TabularForm::INPUT_TEXT],
        'duration_mins' => ['type' => TabularForm::INPUT_TEXT],
        'color' => ['type' => TabularForm::INPUT_TEXT],
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
        'creator' => ['type' => TabularForm::INPUT_TEXT],
        'date_changed' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Date Changed'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'changed_by' => ['type' => TabularForm::INPUT_TEXT],
        'voided' => ['type' => TabularForm::INPUT_TEXT],
        'voided_by' => ['type' => TabularForm::INPUT_TEXT],
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
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowAppointmentService(' . $key . '); return false;', 'id' => 'appointment-service-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Appointment Service'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAppointmentService()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

