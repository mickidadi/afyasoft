<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\billing\models\BlSaleOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Sale Orders');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="bl-sale-orders-index">
 
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
       // 'order_id',
        [
            'attribute' => 'firstName',
            'label'=>"First Name",
            'format'=>'raw',
            'vAlign' => 'middle',
            
            // 'width' => '200px',
            'value' => function ($model) {
            return  $model->patient->patient->given_name;
            },
            ],
            [
                'attribute' => 'middleName',
                'label'=>"Middle Name",
                'format'=>'raw',
                'vAlign' => 'middle',
                
                // 'width' => '200px',
                'value' => function ($model) {
                
                return $model->patient->patient->middle_name;
                },
                ],
                [
                    'attribute' => 'lastName',
                    'label'=>"Last Name",
                    'format'=>'raw',
                    'vAlign' => 'middle',
                    
                    // 'width' => '200px',
                    'value' => function ($model) {
                    
                    return $model->patient->patient->family_name;
                    },
                ],
                'phone_number',
        /*[
                'attribute' => 'patient_id',
                'label' => Yii::t('app', 'Patient'),
                'value' => function($model){                   
                    return $model->patient->patient_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
               // 'filter' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Patient::find()->asArray()->all(), 'patient_id', 'patient_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Patient', 'id' => 'grid-bl-sale-orders-search-patient_id']
            ],*/
        /*[
                'attribute' => 'visit_id',
                'label' => Yii::t('app', 'Visit'),
                'value' => function($model){                   
                    return $model->visit->visit_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
               // 'filter' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\Visit::find()->asArray()->all(), 'visit_id', 'visit_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Visit', 'id' => 'grid-bl-sale-orders-search-visit_id']
            ],*/
        //'total_quote',
        //'payable_amount',
        [
            'attribute' => 'payable_amount',
            'label'=>"Amount",
            'format'=>'raw',
            'vAlign' => 'middle',
            
            // 'width' => '200px',
            'value' => function ($model) {
            
            return $model->getPayableAmount($model->order_id);
            },
        ],
        
        [
            'attribute' => 'status',
            'format'=>'raw',
            'vAlign' => 'middle',
            'label' => Yii::t('app', 'Status'),
            'value' => function($model){                   
                if($model->status==3){
                    $status=Html::label("Canceled", NULL, ['class'=>'label label-danger']);
                  }else  if($model->status==1){
                    $status=Html::label("Paid", NULL, ['class'=>'label label-success']);
                }
                else  if($model->status==2){
                    $status=Html::label("Paid Partial", NULL, ['class'=>'label label-warning']);
                }
                else{
                    $status=Html::label("Not Paid", NULL, ['class'=>'label label-warning']);
                  // $status=Html::a("<i class='fa fa-money'></i> Cash",['payment-cash', 'id' =>$model->uuid]);
                }
            return $status;             
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' =>[0=>"Not Paid",1=>"Paid",3=>"Canceled"],
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Status', 'id' => 'grid-bl-sale-orders-search-status_id']
        ]
       /* [
            'attribute' => 'uuid',
            'label'=>"Actions",
            'format'=>'raw',
            'vAlign' => 'middle',
            
            // 'width' => '200px',
            'value' => function ($model) {
            
                return Html::a("<i class='fa fa-money'></i>Cash",['payment-cash', 'id' =>$model->uuid]);
            },
        ],*/
       // 'status',
       // 'discounted',
       // 'uuid',
       /* [
            'class' => 'yii\grid\ActionColumn',
        ],*/
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-orders']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
       
    ]); ?>

</div>
