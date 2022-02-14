<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->visits,
        'key' => 'visit_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'visit_id',
        [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
        [
                'attribute' => 'visitType.name',
                'label' => Yii::t('app', 'Visit Type')
            ],
        'date_started',
        'date_stopped',
        [
                'attribute' => 'indicationConcept.concept_id',
                'label' => Yii::t('app', 'Indication Concept')
            ],
        [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
        'date_created',
        [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
            ],
        'date_changed',
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
            'controller' => 'visit'
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
