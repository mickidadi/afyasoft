<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->blSaleOrdersLines,
        'key' => 'order_line_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'order_line_id',
        [
                'attribute' => 'saleQuoteLine.quote_line_id',
                'label' => Yii::t('app', 'Sale Quote Line')
            ],
        'payment_status',
        'payment_method',
        'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'bl-sale-orders-line'
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
