<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientCondition */

$this->title = $model->patient_diagnosis_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Condition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-condition-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Patient Condition').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->patient_diagnosis_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->patient_diagnosis_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->patient_diagnosis_id], [
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
        <h4>Concept<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnConcept = [
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
        'model' => $model->concept,
        'attributes' => $gridColumnConcept    ]);
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
</div>
