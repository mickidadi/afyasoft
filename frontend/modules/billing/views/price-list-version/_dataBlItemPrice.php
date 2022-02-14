<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->blItemPrices,
        'key' => 'item_price_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'item_price_id',
        'item',
        [
                'attribute' => 'serviceType.name',
                'label' => Yii::t('app', 'Service Type')
            ],
        [
                'attribute' => 'paymentCategory.concept_id',
                'label' => Yii::t('app', 'Payment Category')
            ],
        [
                'attribute' => 'paymentSubCategory.concept_id',
                'label' => Yii::t('app', 'Payment Sub Category')
            ],
        'selling_price',
        'retired',
        'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'bl-item-price'
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
