<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\DrugQuoteLine */

$this->title = $model->quote_line_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Quote Line'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-quote-line-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Drug Quote Line').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->quote_line_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->quote_line_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->quote_line_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 

    $gridColumn = [
        [
            'attribute' => 'saleQuote.quote_id',
            'label' => Yii::t('app', 'Sale Quote'),
        ],
        'item',
        [
            'attribute' => 'serviceType.name',
            'label' => Yii::t('app', 'Service Type'),
        ],
        [
            'attribute' => 'itemPrice.item_price_id',
            'label' => Yii::t('app', 'Item Price'),
        ],
        'quantity',
        'unit',
        'quoted_amount',
        'payable_amount',
        [
            'attribute' => 'paymentCategory.concept_id',
            'label' => Yii::t('app', 'Payment Category'),
        ],
        [
            'attribute' => 'paymentSubCategory.concept_id',
            'label' => Yii::t('app', 'Payment Sub Category'),
        ],
        [
            'attribute' => 'status0.name',
            'label' => Yii::t('app', 'Status'),
        ],
        'dose',
         
        'comment:ntext',
        'duration',
        'duration_units',
         
        'route',
        'dose_units',
        'frequency',
        
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
   