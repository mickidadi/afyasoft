<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->patientAppointments,
        'key' => 'patient_appointment_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'patient_appointment_id',
        'provider_id',
        'appointment_number',
        [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
        'start_date_time',
        'end_date_time',
        [
                'attribute' => 'appointmentService.name',
                'label' => Yii::t('app', 'Appointment Service')
            ],
        [
                'attribute' => 'appointmentServiceType.name',
                'label' => Yii::t('app', 'Appointment Service Type')
            ],
        'status',
        'appointment_kind',
        'comments',
        'uuid',
        'date_created',
        'creator',
        'date_changed',
        'changed_by',
        'voided',
        'voided_by',
        'date_voided',
        'void_reason',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'patient-appointment'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
