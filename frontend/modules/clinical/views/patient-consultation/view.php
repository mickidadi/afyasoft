<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientConsultation */

$this->title = "Patient Consultation Note:";
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Consultation Note'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-consultation-view">
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
        //'patient_consultation_id',
       /* [
            'attribute' => 'visit.visit_id',
            'label' => Yii::t('app', 'Visit'),
        ],
       /* [
            'attribute' => 'patient.patient_id',
            'label' => Yii::t('app', 'Patient'),
        ],*/
        'comment:ntext',
        [
            'attribute' => 'created_at',
            'label' => Yii::t('app', 'Date Created'),
        ],
        [
            'attribute' => 'createdBy.username',
            'label' => Yii::t('app', 'Created By'),
        ],
        [
            'attribute' => 'updated_at',
            'label' => Yii::t('app', 'Date Updated'),
        ],
        [
            'attribute' => 'updatedBy.username',
            'label' => Yii::t('app', 'updated By'),
        ]
       // 'uuid',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
  
   
</div>
</div>
</div>
</div>
