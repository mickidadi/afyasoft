<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Patient */

$this->title = Yii::t('app', 'Update Patient: {name}', [
    'name' => "",
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->patient_id, 'url' => ['view', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-update">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
    <?= $this->render('_form_update', [
        'model' => $model,
        "action"=>$action
    ]) ?>

</div>
</div>
</div>