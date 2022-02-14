<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\billing\models\BlSaleQuoteLineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Bl Sale Quote Line');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="bl-sale-quote-line-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bl Sale Quote Line'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        'quote_line_id',
        [
                'attribute' => 'sale_quote',
                'label' => Yii::t('app', 'Sale Quote'),
                'value' => function($model){                   
                    return $model->saleQuote->quote_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\BlSaleQuote::find()->asArray()->all(), 'quote_id', 'quote_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Bl sale quote', 'id' => 'grid-bl-sale-quote-line-search-sale_quote']
            ],
        'item',
        [
                'attribute' => 'service_type',
                'label' => Yii::t('app', 'Service Type'),
                'value' => function($model){                   
                    return $model->serviceType->name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\BlServiceType::find()->asArray()->all(), 'service_type_id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Bl service type', 'id' => 'grid-bl-sale-quote-line-search-service_type']
            ],
        [
                'attribute' => 'item_price',
                'label' => Yii::t('app', 'Item Price'),
                'value' => function($model){                   
                    return $model->itemPrice->item_price_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\BlItemPrice::find()->asArray()->all(), 'item_price_id', 'item_price_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Bl item price', 'id' => 'grid-bl-sale-quote-line-search-item_price']
            ],
        'quantity',
        'unit',
        'quoted_amount',
        'payable_amount',
        [
                'attribute' => 'payment_category',
                'label' => Yii::t('app', 'Payment Category'),
                'value' => function($model){                   
                    return $model->paymentCategory->concept_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->asArray()->all(), 'concept_id', 'concept_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Concept', 'id' => 'grid-bl-sale-quote-line-search-payment_category']
            ],
        [
                'attribute' => 'payment_sub_category',
                'label' => Yii::t('app', 'Payment Sub Category'),
                'value' => function($model){                   
                    return $model->paymentSubCategory->concept_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Concept::find()->asArray()->all(), 'concept_id', 'concept_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Concept', 'id' => 'grid-bl-sale-quote-line-search-payment_sub_category']
            ],
        [
                'attribute' => 'status',
                'label' => Yii::t('app', 'Status'),
                'value' => function($model){                   
                    return $model->status0->name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\BlQuoteStatusCode::find()->asArray()->all(), 'status_code_id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Bl quote status code', 'id' => 'grid-bl-sale-quote-line-search-status']
            ],
        'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{save-as-new} {view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
            ],
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-quote-line']],
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
