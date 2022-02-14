<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->surgicalBlocks,
        'key' => 'surgical_block_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'surgical_block_id',
        'primary_provider_id',
        'start_datetime',
        'end_datetime',
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
            'controller' => 'surgical-block'
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
