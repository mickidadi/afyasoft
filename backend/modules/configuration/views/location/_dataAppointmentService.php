<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->appointmentServices,
        'key' => 'appointment_service_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'appointment_service_id',
        'name',
        'description:ntext',
        'start_time',
        'end_time',
        [
                'attribute' => 'speciality.name',
                'label' => Yii::t('app', 'Speciality')
            ],
        'max_appointments_limit',
        'duration_mins',
        'color',
        'date_created',
        'creator',
        'date_changed',
        'changed_by',
        'voided',
        'voided_by',
        'date_voided',
        'void_reason',
        'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'appointment-service'
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
