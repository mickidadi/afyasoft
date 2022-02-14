<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosis */

$this->title ="Patient Conditions :";
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Diagnosis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-diagnosis-view">
<div class="panel panel-info">
        <div class="panel-heading">
         <?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label>
        </div>
        <div class="panel-body">
              <div class="panel-body">  
    <p  class="pull-right">
             <?= Html::a(Yii::t('app', '<i class="fa fa-pencil"></i>Update'), ['update', 'id' => $model->uuid,'patient_uuid'=>$patient_uuid], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-trash"></i>Delete'), ['delete', 'id' => $model->uuid,'patient_uuid'=>$patient_uuid], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
       </p>
<?php 
    $gridColumn = [
       // 'patient_diagnosis_id',
        /*[
            'attribute' => 'patient.patient_id',
            'label' => Yii::t('app', 'Patient'),
        ],
        [
            'attribute' => 'visit.visit_id',
            'label' => Yii::t('app', 'Visit'),
        ],*/
        [
            'attribute' => 'concept.concept_name_en',
            'label' => Yii::t('app', 'Condition'),
        ],
      //  'orders',
        'comment:ntext',
       // 'condition_date 1=>"Confirmed",2=>"Presumed"',
        //'status',
        [
            'attribute' => 'status',
            'label' => Yii::t('app', 'Status'),
            'value'=>$model->status==0?"InActiive":"Active"
        ],
       'condition_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    </div>
    </div>
