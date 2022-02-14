<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\billing\models\BlItemPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\Concept;
use kartik\export\ExportMenu;
use common\models\BlServiceType;
use frontend\modules\billing\models\BlPriceListVersion;

$this->title = Yii::t('app', 'Bl Item Price');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="bl-item-price-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bl Item Price'), ['create'], ['class' => 'btn btn-success']) ?>
       
    </p>
   
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        //'item_price_id',
        [
                'attribute' => 'price_list_version',
                'label' => Yii::t('app', 'Price Version'),
                'value' => function($model){                   
                    return $model->priceListVersion->version_name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(BlPriceListVersion::find()->asArray()->all(), 'id', 'version_name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Price Version', 'id' => 'grid-bl-item-price-search-price_list_version']
            ],
            [
                'attribute' => 'item',
                'label' => Yii::t('app', 'Item'),
                'value' => function($model){                   
                    return Concept::getSaleItemName($model->item,$model->service_type);                   
                },
                //'value'=>$model->item
            ],
       // 'item',
           [
                'attribute' => 'service_type',
                'label' => Yii::t('app', 'Service Type'),
                'value' => function($model){                   
                    return $model->serviceType->name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(BlServiceType::find()->asArray()->all(), 'service_type_id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Service Type', 'id' => 'grid-bl-item-price-search-service_type']
            ],
            [
                'attribute' => 'payment_category',
                'label' => Yii::t('app', 'Payment Category'),
                'value' => function($model){   
                     $payment_category=$model->paymentCategory->concept_id;   
                    $method=" "; 
                           if($payment_category==4030){
                            $method="Cash";
                           }else if($payment_category==4031){
                            $method="Insurance";
                           }         
                    return $method;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' =>["4030"=>"Cash","4031"=>"Insurance"],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Concept', 'id' => 'grid-bl-item-price-search-payment_category']
           ],
           [
                'attribute' => 'payment_sub_category',
                'label' => Yii::t('app', 'Payment Sub Category'),
                'value' => function($model){                   
                    return $model->paymentSubCategory->concept_name_en;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Concept::getConceptAnswer(6217), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Concept', 'id' => 'grid-bl-item-price-search-payment_sub_category']
            ],
        'selling_price',
        'retired',
        //'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-item-price']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
