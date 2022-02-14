<?php
use Yii;
use kartik\helpers\Html;
use kartik\grid\GridView;
use common\models\Concept;
use kartik\widgets\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use common\models\BlSaleQuoteLine;
    $form = ActiveForm::begin();?> 
   
   <?php
    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->blSaleQuoteLines,
        'key' => 'quote_line_id'
    ]);
    $patient_id=$model->patient;
    $query = BlSaleQuoteLine::find()->joinWith("saleQuote")->where("bl_sale_quote.patient='{$patient_id}' AND bl_sale_quote_line.status<>6");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    echo '<input type="hidden" name="patient_id" value="'.$patient_id.'">';
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['class' => '\kartik\grid\CheckboxColumn'],
      
       // 'quote_line_id',
        //'item',
        [
            'attribute' => 'item',
            'label' => Yii::t('app', 'Service Type'),
            'value' => function($model){                   
                return Concept::getSaleItemName($model->item,$model->service_type);                   
            },
            //'value'=>$model->item
        ],
       // 'service_type',
        /*[
                'attribute' => 'serviceType.name',
                'label' => Yii::t('app', 'Service Type')
        ],
        /*[
                'attribute' => 'itemPrice.item_price_id',
                'label' => Yii::t('app', 'Item Price')
         ],*/
        'quantity',
        'unit',
        'quoted_amount',
        'payable_amount',
        [
                'attribute' => 'paymentCategory.concept_name_en',
                'label' => Yii::t('app', 'Payment Category')
            ],
        [
                'attribute' => 'paymentSubCategory.concept_name_en',
                'label' => Yii::t('app', 'Payment Sub Category')
            ],
        [
                'attribute' => 'status0.name',
                'label' => Yii::t('app', 'Status')
            ],
       // 'uuid',
       /* [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'bl-sale-quote-line'
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
    ]);?>
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' =>'btn btn-success' ]) ?>
    <?php ActiveForm::end(); ?>
 