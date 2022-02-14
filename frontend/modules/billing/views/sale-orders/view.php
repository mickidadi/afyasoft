<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleOrders */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-sale-orders-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Bl Sale Orders').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->order_id], [
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
        'order_id',
        [
            'attribute' => 'patient.patient_id',
            'label' => Yii::t('app', 'Patient'),
        ],
        [
            'attribute' => 'visit.visit_id',
            'label' => Yii::t('app', 'Visit'),
        ],
        'total_quote',
        'payable_amount',
        'status',
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
        <h4>Patient<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPatient = [
        'voided',
        'voided_by',
        'date_voided',
        'void_reason',
        'allergy_status',
    ];
    echo DetailView::widget([
        'model' => $model->patient,
        'attributes' => $gridColumnPatient    ]);
    ?>
    <div class="row">
        <h4>Visit<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnVisit = [
        [
            'attribute' => 'patient.patient_id',
            'label' => Yii::t('app', 'Patient'),
        ],
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
        'model' => $model->visit,
        'attributes' => $gridColumnVisit    ]);
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
<?php
if($providerBlSaleOrdersLine->totalCount){
    $gridColumnBlSaleOrdersLine = [
        ['class' => 'yii\grid\SerialColumn'],
            'order_line_id',
                        [
                'attribute' => 'saleQuoteLine.quote_line_id',
                'label' => Yii::t('app', 'Sale Quote Line')
            ],
            'payment_status',
            'payment_method',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBlSaleOrdersLine,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bl-sale-orders-line']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bl Sale Orders Line')),
        ],
        'export' => false,
        'columns' => $gridColumnBlSaleOrdersLine
    ]);
}
?>

    </div>
</div>
