<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuote */

$this->title = $model->quote_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Quote'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-sale-quote-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Bl Sale Quote').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->quote_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->quote_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->quote_id], [
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
        'quote_id',
        [
            'attribute' => 'patient0.patient_id',
            'label' => Yii::t('app', 'Patient'),
        ],
        [
            'attribute' => 'visit0.visit_id',
            'label' => Yii::t('app', 'Visit'),
        ],
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
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerBlSaleOrderByQuote->totalCount){
    $gridColumnBlSaleOrderByQuote = [
        ['class' => 'yii\grid\SerialColumn'],
            'soq_no',
            'dated_sale_id',
                        'payment_method',
            'payable_amount',
            'paid_amount',
            'debt_amount',
            'installment_frequency',
            [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
            'date_created',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBlSaleOrderByQuote,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-order-by-quote']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bl Sale Order By Quote')),
        ],
        'export' => false,
        'columns' => $gridColumnBlSaleOrderByQuote
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
        <h4>Patient<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPatient = [
        'patient_id',
        'voided',
        'voided_by',
        'date_voided',
        'void_reason',
        'allergy_status',
    ];
    echo DetailView::widget([
        'model' => $model->patient0,
        'attributes' => $gridColumnPatient    ]);
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
        <h4>Visit<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnVisit = [
        'visit_id',
        'patient_id',
        'visit_type_id',
        'date_started',
        'date_stopped',
        'indication_concept_id',
        'location_id',
        'voided',
        'voided_by',
        'date_voided',
        'void_reason',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->visit0,
        'attributes' => $gridColumnVisit    ]);
    ?>
    
    <div class="row">
<?php
if($providerBlSaleQuoteLine->totalCount){
    $gridColumnBlSaleQuoteLine = [
        ['class' => 'yii\grid\SerialColumn'],
            'quote_line_id',
                        'item',
            [
                'attribute' => 'serviceType.name',
                'label' => Yii::t('app', 'Service Type')
            ],
            [
                'attribute' => 'itemPrice.item_price_id',
                'label' => Yii::t('app', 'Item Price')
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
