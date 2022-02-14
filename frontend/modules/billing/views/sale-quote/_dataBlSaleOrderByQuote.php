<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->blSaleOrderByQuotes,
        'key' => 'soq_no'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'soq_no',
        'dated_sale_id',
        'payment_method',
        'payable_amount',
        'paid_amount',
        'debt_amount',
        'installment_frequency',
        [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
        'date_created',
        'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'bl-sale-order-by-quote'
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
