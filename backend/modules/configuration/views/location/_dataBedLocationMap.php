<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->bedLocationMaps,
        'key' => 'bed_location_map_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'bed_location_map_id',
        'row_number',
        'column_number',
        [
                'attribute' => 'bed.bed_id',
                'label' => Yii::t('app', 'Bed')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'bed-location-map'
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
