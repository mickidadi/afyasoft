<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\DrugQuoteLine */

?>
<div class="drug-quote-line-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->quote_line_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'quoteLine.quote_line_id',
            'label' => Yii::t('app', 'Quote Line'),
        ],
        [
            'attribute' => 'drugInventory.name',
            'label' => Yii::t('app', 'Drug Inventory'),
        ],
        'dose',
        'as_needed',
        'dosing_type',
        'quantity',
        'as_needed_condition',
        'num_refills',
        'dosing_instructions:ntext',
        'duration',
        'duration_units',
        'quantity_units',
        'route',
        'dose_units',
        'frequency',
        'brand_name',
        'dispense_as_written',
        'drug_non_coded',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>