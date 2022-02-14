<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\billing\models\BlSaleQuoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Sale Quote');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="bl-sale-quote-index">
 
    <div class="search-form" style="display:none">
        <?php //=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        //'quote_id',
        [
            'attribute' => 'firstName',
            'label'=>"First Name",
            'format'=>'raw',
            'vAlign' => 'middle',
            
            // 'width' => '200px',
            'value' => function ($model) {
            return  $model->patient0->patient->given_name;
            },
            ],
            [
                'attribute' => 'middleName',
                'label'=>"Middle Name",
                'format'=>'raw',
                'vAlign' => 'middle',
                
                // 'width' => '200px',
                'value' => function ($model) {
                
                return $model->patient0->patient->middle_name;
                },
                ],
                [
                    'attribute' => 'lastName',
                    'label'=>"Last Name",
                    'format'=>'raw',
                    'vAlign' => 'middle',
                    
                    // 'width' => '200px',
                    'value' => function ($model) {
                    
                    return $model->patient0->patient->family_name;
                    },
                ],
                'phone_number',
        /*[
                'attribute' => 'visit',
                'label' => Yii::t('app', 'Visit'),
                'value' => function($model){                   
                    return $model->visit0->visit_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
               // 'filter' => \yii\helpers\ArrayHelper::map(\common\models\Visit::find()->asArray()->all(), 'visit_id', 'visit_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Visit', 'id' => 'grid-bl-sale-quote-search-visit']
            ],*/
        'total_quote',
        'created_at',
        'created_by'
       // 'payable_amount',
       /* [
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
                'filterInputOptions' => ['placeholder' => 'Bl quote status code', 'id' => 'grid-bl-sale-quote-search-status']
            ],
       // 'discounted',
        //'uuid',
        /*[
            'class' => 'yii\grid\ActionColumn',
            'template' => '{save-as-new} {view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
            ],
        ],*/
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-quote']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        
    ]); ?>

</div>
