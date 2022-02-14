<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuoteLine */

$this->title = $model->quote_line_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Quote Line'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-sale-quote-line-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Bl Sale Quote Line').' '. Html::encode($this->title) ?></h2>
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
        'quote_line_id',
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
if($providerBlDiscount->totalCount){
    $gridColumnBlDiscount = [
        ['class' => 'yii\grid\SerialColumn'],
            'discount_id',
                        'original_quoted_amount',
            'proposed_discount_amount',
            'approved_discount_amount',
            [
                'attribute' => 'discountCriteria.name',
                'label' => Yii::t('app', 'Discount Criteria')
            ],
            [
                'attribute' => 'initiatedBy.username',
                'label' => Yii::t('app', 'Initiated By')
            ],
            'date_created',
            'approved',
            [
                'attribute' => 'approvedBy.username',
                'label' => Yii::t('app', 'Approved By')
            ],
            'date_approved',
            'changed_by',
            'date_changed',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBlDiscount,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-discount']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bl Discount')),
        ],
        'export' => false,
        'columns' => $gridColumnBlDiscount
    ]);
}
?>

    </div>
    <div class="row">
        <h4>BlSaleOrderByQuoteLine<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlSaleOrderByQuoteLine = [
        'soql_no',
        'sale_order_quote',
        'paid_amount',
        'debt_amount',
        'date_created',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->blSaleOrderByQuoteLine,
        'attributes' => $gridColumnBlSaleOrderByQuoteLine    ]);
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
        <h4>BlItemPrice<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlItemPrice = [
        'item_price_id',
        'price_list_version',
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
        'creator',
        'date_created',
        'changed_by',
        'date_changed',
        'retired',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->itemPrice,
        'attributes' => $gridColumnBlItemPrice    ]);
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
        <h4>BlSaleQuote<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlSaleQuote = [
        'quote_id',
        'patient',
        'visit',
        'total_quote',
        'payable_amount',
        [
            'attribute' => 'status0.name',
            'label' => Yii::t('app', 'Status'),
        ],
        'discounted',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->saleQuote,
        'attributes' => $gridColumnBlSaleQuote    ]);
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
        <h4>BlQuoteStatusCode<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBlQuoteStatusCode = [
        'status_code_id',
        'name',
        'quote_type',
        'creator',
        'date_created',
        'changed_by',
        'date_changed',
        'retired',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->status0,
        'attributes' => $gridColumnBlQuoteStatusCode    ]);
    ?>
    
    <div class="row">
<?php
if($providerBlSaleQuoteReferenceMap->totalCount){
    $gridColumnBlSaleQuoteReferenceMap = [
        ['class' => 'yii\grid\SerialColumn'],
            'entry_no',
                        'reference_value',
            'reference_type',
            'reference_format',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBlSaleQuoteReferenceMap,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-quote-reference-map']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bl Sale Quote Reference Map')),
        ],
        'export' => false,
        'columns' => $gridColumnBlSaleQuoteReferenceMap
    ]);
}
?>

    </div>
</div>
