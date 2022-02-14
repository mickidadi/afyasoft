<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Location')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Appointment Service')),
        'content' => $this->render('_dataAppointmentService', [
            'model' => $model,
            'row' => $model->appointmentServices,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Bed Location Map')),
        'content' => $this->render('_dataBedLocationMap', [
            'model' => $model,
            'row' => $model->bedLocationMaps,
        ]),
    ],
                    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Location')),
        'content' => $this->render('_dataLocation', [
            'model' => $model,
            'row' => $model->locations,
        ]),
    ],
                    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Location Tag Map')),
        'content' => $this->render('_dataLocationTagMap', [
            'model' => $model,
            'row' => $model->locationTagMaps,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Obs')),
        'content' => $this->render('_dataObs', [
            'model' => $model,
            'row' => $model->obs,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Patient Appointment')),
        'content' => $this->render('_dataPatientAppointment', [
            'model' => $model,
            'row' => $model->patientAppointments,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Patient Identifier')),
        'content' => $this->render('_dataPatientIdentifier', [
            'model' => $model,
            'row' => $model->patientIdentifiers,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Patient Program')),
        'content' => $this->render('_dataPatientProgram', [
            'model' => $model,
            'row' => $model->patientPrograms,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Surgical Block')),
        'content' => $this->render('_dataSurgicalBlock', [
            'model' => $model,
            'row' => $model->surgicalBlocks,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Visit')),
        'content' => $this->render('_dataVisit', [
            'model' => $model,
            'row' => $model->visits,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
