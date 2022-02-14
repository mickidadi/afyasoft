<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\billing\models\BlFinancialPeriodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'List of Financial Period');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="bl-financial-period-index">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
   
    <p>
        <?= Html::a(Yii::t('app', 'Register Financial Period'), ['create'], ['class' => 'btn btn-success']) ?>
       
    </p>
    
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
       // 'period_id',
        'name',
        'start_date',
        'end_date',
        [
            'attribute' => 'status',
            'label'=>"",
            'format'=>'raw',
            'vAlign' => 'middle',
            
            // 'width' => '200px',
            'value' => function ($model) {
                $status=Html::label("Not Set", NULL, ['class'=>'label label-warning']);
                  if($model->status==0){
                    $status=Html::label("InActive", NULL, ['class'=>'label label-danger']);
                  }else  if($model->status==1){
                    $status=Html::label("Active", NULL, ['class'=>'label label-success']);
                }
                
            return $status;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' =>[0=>"InActive",1=>"Active"],
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Status', 'id' => 'grid-bl-sale-orders-search-status_id']
        ],
        //'status',
       // 'uuid',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-financial-period']],
        'export' => false,
        // your toolbar can include the additional full export menu
        
    ]); ?>
 
</div>
</div>
</div>