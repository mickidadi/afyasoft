<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Location */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AppointmentService', 
        'relID' => 'appointment-service', 
        'value' => \yii\helpers\Json::encode($model->appointmentServices),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BedLocationMap', 
        'relID' => 'bed-location-map', 
        'value' => \yii\helpers\Json::encode($model->bedLocationMaps),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Location', 
        'relID' => 'location', 
        'value' => \yii\helpers\Json::encode($model->locations),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'LocationTagMap', 
        'relID' => 'location-tag-map', 
        'value' => \yii\helpers\Json::encode($model->locationTagMaps),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Obs', 
        'relID' => 'obs', 
        'value' => \yii\helpers\Json::encode($model->obs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PatientAppointment', 
        'relID' => 'patient-appointment', 
        'value' => \yii\helpers\Json::encode($model->patientAppointments),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PatientIdentifier', 
        'relID' => 'patient-identifier', 
        'value' => \yii\helpers\Json::encode($model->patientIdentifiers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PatientProgram', 
        'relID' => 'patient-program', 
        'value' => \yii\helpers\Json::encode($model->patientPrograms),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SurgicalBlock', 
        'relID' => 'surgical-block', 
        'value' => \yii\helpers\Json::encode($model->surgicalBlocks),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Visit', 
        'relID' => 'visit', 
        'value' => \yii\helpers\Json::encode($model->visits),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'location_id')->textInput(['placeholder' => 'Location']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) ?>

    <?= $form->field($model, 'city_village')->textInput(['maxlength' => true, 'placeholder' => 'City Village']) ?>

    <?= $form->field($model, 'state_province')->textInput(['maxlength' => true, 'placeholder' => 'State Province']) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true, 'placeholder' => 'Postal Code']) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true, 'placeholder' => 'Longitude']) ?>

    <?= $form->field($model, 'creator')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'date_created')->widget(\kartik\datecontrol\DateControl::classname(), [
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

    <?= $form->field($model, 'county_district')->textInput(['maxlength' => true, 'placeholder' => 'County District']) ?>

    <?= $form->field($model, 'address3')->textInput(['maxlength' => true, 'placeholder' => 'Address3']) ?>

    <?= $form->field($model, 'address4')->textInput(['maxlength' => true, 'placeholder' => 'Address4']) ?>

    <?= $form->field($model, 'address5')->textInput(['maxlength' => true, 'placeholder' => 'Address5']) ?>

    <?= $form->field($model, 'address6')->textInput(['maxlength' => true, 'placeholder' => 'Address6']) ?>

    <?= $form->field($model, 'retired')->checkbox() ?>

    <?= $form->field($model, 'retired_by')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'date_retired')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Retired'),
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'retire_reason')->textInput(['maxlength' => true, 'placeholder' => 'Retire Reason']) ?>

    <?= $form->field($model, 'parent_location')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Location::find()->orderBy('location_id')->asArray()->all(), 'location_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Location')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) ?>

    <?= $form->field($model, 'changed_by')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'date_changed')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Changed'),
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'address7')->textInput(['maxlength' => true, 'placeholder' => 'Address7']) ?>

    <?= $form->field($model, 'address8')->textInput(['maxlength' => true, 'placeholder' => 'Address8']) ?>

    <?= $form->field($model, 'address9')->textInput(['maxlength' => true, 'placeholder' => 'Address9']) ?>

    <?= $form->field($model, 'address10')->textInput(['maxlength' => true, 'placeholder' => 'Address10']) ?>

    <?= $form->field($model, 'address11')->textInput(['maxlength' => true, 'placeholder' => 'Address11']) ?>

    <?= $form->field($model, 'address12')->textInput(['maxlength' => true, 'placeholder' => 'Address12']) ?>

    <?= $form->field($model, 'address13')->textInput(['maxlength' => true, 'placeholder' => 'Address13']) ?>

    <?= $form->field($model, 'address14')->textInput(['maxlength' => true, 'placeholder' => 'Address14']) ?>

    <?= $form->field($model, 'address15')->textInput(['maxlength' => true, 'placeholder' => 'Address15']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'AppointmentService')),
            'content' => $this->render('_formAppointmentService', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->appointmentServices),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'BedLocationMap')),
            'content' => $this->render('_formBedLocationMap', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->bedLocationMaps),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Location')),
            'content' => $this->render('_formLocation', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->locations),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'LocationTagMap')),
            'content' => $this->render('_formLocationTagMap', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->locationTagMaps),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Obs')),
            'content' => $this->render('_formObs', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->obs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'PatientAppointment')),
            'content' => $this->render('_formPatientAppointment', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->patientAppointments),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'PatientIdentifier')),
            'content' => $this->render('_formPatientIdentifier', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->patientIdentifiers),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'PatientProgram')),
            'content' => $this->render('_formPatientProgram', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->patientPrograms),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'SurgicalBlock')),
            'content' => $this->render('_formSurgicalBlock', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->surgicalBlocks),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Visit')),
            'content' => $this->render('_formVisit', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->visits),
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
