<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->obs,
        'key' => 'obs_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'obs_id',
        [
                'attribute' => 'person.person_id',
                'label' => Yii::t('app', 'Person')
            ],
        [
                'attribute' => 'concept.concept_id',
                'label' => Yii::t('app', 'Concept')
            ],
        'encounter_id',
        [
                'attribute' => 'order.order_id',
                'label' => Yii::t('app', 'Order')
            ],
        'obs_datetime',
        [
                'attribute' => 'obsGroup.obs_id',
                'label' => Yii::t('app', 'Obs Group')
            ],
        'accession_number',
        'value_group_id',
        [
                'attribute' => 'valueCoded.concept_id',
                'label' => Yii::t('app', 'Value Coded')
            ],
        'value_coded_name_id',
        [
                'attribute' => 'valueDrug.name',
                'label' => Yii::t('app', 'Value Drug')
            ],
        'value_datetime',
        'value_numeric',
        'value_modifier',
        'value_text:ntext',
        'value_complex',
        'comments',
        [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
        'date_created',
        'voided',
        [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
        'date_voided',
        'void_reason',
        'uuid',
        [
                'attribute' => 'previousVersion.obs_id',
                'label' => Yii::t('app', 'Previous Version')
            ],
        'form_namespace_and_path',
        'status',
        'interpretation',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'obs'
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
