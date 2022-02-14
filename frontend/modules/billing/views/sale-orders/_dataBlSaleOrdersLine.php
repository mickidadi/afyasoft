<?php
use kartik\grid\GridView;
use common\models\Concept;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->blSaleOrdersLines,
        'key' => 'order_line_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
       // 'order_line_id',
           /*[
                'attribute' => 'saleQuoteLine.quote_line_id',
                'label' => Yii::t('app', 'Sale Quote')
            ],*/
            [
                'attribute' => 'sale_quote_line_id',
                'label' => Yii::t('app', 'Service'),
                'value' => function($model){                   
                    return Concept::getSaleItemName($model->saleQuoteLine->item,$model->saleQuoteLine->service_type);                   
                },
                //'value'=>$model->item
            ],
            [
                'attribute' => 'quantity',
                'label' => Yii::t('app', 'Quantity'),
                'value' => function($model){                   
                    return $model->saleQuoteLine->quantity;                   
                },
                //'value'=>$model->item
            ],
            [
                'attribute' => 'unit',
                'label' => Yii::t('app', 'Unit'),
                'value' => function($model){                   
                    return $model->saleQuoteLine->unit;                   
                },
                //'value'=>$model->item
            ],
             
            [
                'attribute' => 'payable_amount',
                'label' => Yii::t('app', 'Payable Amount'),
                'value' => function($model){                   
                    return $model->saleQuoteLine->payable_amount;                   
                },
                //'value'=>$model->item
            ],
            //'quoted_amount',
           // 'payable_amount',
          
        [
            'attribute' => 'quoted_amount',
            'label' => Yii::t('app', 'Payment Category'),
            'value' => function($model){                   
                return $model->saleQuoteLine->paymentCategory->concept_name_en;                   
            },
            //'value'=>$model->item
        ],
        [
            'attribute' => 'quoted_amount',
            'label' => Yii::t('app', 'Payment Sub Category'),
            'value' => function($model){                   
                return $model->saleQuoteLine->paymentSubCategory->concept_name_en;                   
            },
            //'value'=>$model->item
        ],
        //'payment_status',
        //'payment_method',
       // 'uuid',
       /* [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'bl-sale-orders-line'
        ],*/
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
