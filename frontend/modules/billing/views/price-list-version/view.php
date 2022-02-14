<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlPriceListVersion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Price List Version'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-price-list-version-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Bl Price List Version').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'financialPeriod.name',
            'label' => Yii::t('app', 'Financial Period'),
        ],
        'version_name',
        'status',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerBlItemPrice->totalCount){
    $gridColumnBlItemPrice = [
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
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBlItemPrice,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-item-price']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bl Item Price')),
        ],
        'export' => false,
        'columns' => $gridColumnBlItemPrice
    ]);
}
?>

    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'password_hash',
        'auth_key',
        'secret_question',
        'secret_answer',
        'person_id',
        'status',
        'retired',
        'retired_by',
        'date_retired',
        'retire_reason',
        'location_id',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->updatedBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'password_hash',
        'auth_key',
        'secret_question',
        'secret_answer',
        'person_id',
        'status',
        'retired',
        'retired_by',
        'date_retired',
        'retire_reason',
        'location_id',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->createdBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>BlFinancialPeriod<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlFinancialPeriod = [
        'period_id',
        'name',
        'start_date',
        'end_date',
        'status',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->financialPeriod,
        'attributes' => $gridColumnBlFinancialPeriod    ]);
    ?>
</div>
