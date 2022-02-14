<div class="form-group" id="add-patient-appointment">
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
    'formName' => 'PatientAppointment',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'patient_appointment_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'provider_id' => ['type' => TabularForm::INPUT_TEXT],
        'appointment_number' => ['type' => TabularForm::INPUT_TEXT],
        'patient_id' => [
            'label' => 'Patient',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Patient::find()->orderBy('patient_id')->asArray()->all(), 'patient_id', 'patient_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Patient')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'start_date_time' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose Start Date Time'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'end_date_time' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Choose End Date Time'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'appointment_service_id' => [
            'label' => 'Appointment service',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\AppointmentService::find()->orderBy('name')->asArray()->all(), 'appointment_service_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Appointment service')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'appointment_service_type_id' => [
            'label' => 'Appointment service type',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\AppointmentServiceType::find()->orderBy('name')->asArray()->all(), 'appointment_service_type_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Appointment service type')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'status' => ['type' => TabularForm::INPUT_TEXT],
        'appointment_kind' => ['type' => TabularForm::INPUT_TEXT],
        'comments' => ['type' => TabularForm::INPUT_TEXT],
        'uuid' => ['type' => TabularForm::INPUT_TEXT],
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
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowPatientAppointment(' . $key . '); return false;', 'id' => 'patient-appointment-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Patient Appointment'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPatientAppointment()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

