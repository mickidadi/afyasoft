<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\billing\models\BlPriceListVersionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Price List Version');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="bl-price-list-version-index">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
    <p>
        <?= Html::a(Yii::t('app', 'Register Price List Version'), ['create'], ['class' => 'btn btn-success']) ?>
     
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'financial_period_id',
                'label' => Yii::t('app', 'Financial Period'),
                'value' => function($model){                   
                    return $model->financialPeriod->name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\frontend\modules\billing\models\BlFinancialPeriod::find()->asArray()->all(), 'period_id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Financial Period', 'id' => 'grid-bl-price-list-version-search-financial_period_id']
            ],
        'version_name',
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
        ],
        //'status',
        //'uuid',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-price-list-version']],
        
        'export' => false,
        // your toolbar can include the additional full export menu
        
    ]); ?>

</div>
</div>
</div>