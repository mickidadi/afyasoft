<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientCondition */

?>
<div class="patient-condition-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->patient_diagnosis_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'patient_diagnosis_id',
        [
            'attribute' => 'patient.patient_id',
            'label' => Yii::t('app', 'Patient'),
        ],
        [
            'attribute' => 'visit.visit_id',
            'label' => Yii::t('app', 'Visit'),
        ],
        [
            'attribute' => 'concept.concept_id',
            'label' => Yii::t('app', 'Concept'),
        ],
        'orders',
        'certainty',
        'comment:ntext',
        'condition_date',
        'status',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>