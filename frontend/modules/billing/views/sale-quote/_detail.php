<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuote */

?>
<div class="bl-sale-quote-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->quote_id) ?></h2>
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
</div>