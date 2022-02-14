<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\BlItemPrice */

$this->title = $model->item_price_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Item Price'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-item-price-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Bl Item Price').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->item_price_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->item_price_id], [
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
        'item_price_id',
        [
            'attribute' => 'priceListVersion.id',
            'label' => Yii::t('app', 'Price List Version'),
        ],
        'item',
        [
            'attribute' => 'serviceType.name',
            'label' => Yii::t('app', 'Service Type'),
        ],
        [
            'attribute' => 'paymentCategory.concept_id',
            'label' => Yii::t('app', 'Payment Category'),
        ],
        [
            'attribute' => 'paymentSubCategory.concept_id',
            'label' => Yii::t('app', 'Payment Sub Category'),
        ],
        'selling_price',
        'retired',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
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
        <h4>Concept<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnConcept = [
        'concept_id',
        'concept_name_en',
        'concept_name_type',
        'retired',
        'short_name',
        'description',
        'form_text',
        'datatype_id',
        'class_id',
        'is_set',
        'concept_set',
        'concept_answer',
        'version',
        'retired_by',
        'date_retired',
        'retire_reason',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->paymentCategory,
        'attributes' => $gridColumnConcept    ]);
    ?>
    <div class="row">
        <h4>Concept<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnConcept = [
        'concept_id',
        'concept_name_en',
        'concept_name_type',
        'retired',
        'short_name',
        'description',
        'form_text',
        'datatype_id',
        'class_id',
        'is_set',
        'concept_set',
        'concept_answer',
        'version',
        'retired_by',
        'date_retired',
        'retire_reason',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->paymentSubCategory,
        'attributes' => $gridColumnConcept    ]);
    ?>
    <div class="row">
        <h4>BlPriceListVersion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlPriceListVersion = [
        ['attribute' => 'id', 'visible' => false],
        'financial_period_id',
        'version_name',
        'status',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->priceListVersion,
        'attributes' => $gridColumnBlPriceListVersion    ]);
    ?>
    <div class="row">
        <h4>BlServiceType<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlServiceType = [
        'service_type_id',
        'name',
        'creator',
        'date_created',
        'changed_by',
        'date_changed',
        'retired',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->serviceType,
        'attributes' => $gridColumnBlServiceType    ]);
    ?>
    
    <div class="row">
<?php
if($providerBlSaleQuoteLine->totalCount){
    $gridColumnBlSaleQuoteLine = [
        ['class' => 'yii\grid\SerialColumn'],
            'quote_line_id',
            [
                'attribute' => 'saleQuote.quote_id',
                'label' => Yii::t('app', 'Sale Quote')
            ],
            'item',
            [
                'attribute' => 'serviceType.name',
                'label' => Yii::t('app', 'Service Type')
            ],
                        'quantity',
            'unit',
            'quoted_amount',
            'payable_amount',
            [
                'attribute' => 'paymentCategory.concept_id',
                'label' => Yii::t('app', 'Payment Category')
            ],
            [
                'attribute' => 'paymentSubCategory.concept_id',
                'label' => Yii::t('app', 'Payment Sub Category')
            ],
            [
                'attribute' => 'status0.name',
                'label' => Yii::t('app', 'Status')
            ],
            'dose',
            'dose_units',
            'duration',
            'duration_units',
            'route',
            'frequency',
            'comment:ntext',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBlSaleQuoteLine,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-quote-line']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bl Sale Quote Line')),
        ],
        'export' => false,
        'columns' => $gridColumnBlSaleQuoteLine
    ]);
}
?>

    </div>
</div>
