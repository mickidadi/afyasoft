<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Patient */

$this->title = Yii::t('app', 'Register Patient');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-create">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'action'=>$action,
        //'model_person' => $model_person,
      //  'model_person_name' => $model_person_name,
        'model_person_address' => $model_person_address,
    ]) ?>

</div>
</div>
</div>