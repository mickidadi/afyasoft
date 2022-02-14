<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->patientIdentifiers,
        'key' => 'patient_identifier_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'patient_identifier_id',
        [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
        'identifier',
        [
                'attribute' => 'entifierType.name',
                'label' => Yii::t('app', 'Identifier Type')
            ],
        'preferred',
        [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
        'date_created',
        'date_changed',
        [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
            ],
        'voided',
        [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
        'date_voided',
        'void_reason',
        'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'patient-identifier'
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
