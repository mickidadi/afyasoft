<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleOrders */

?>
<div class="bl-sale-orders-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->order_id) ?></h2>
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
</div>