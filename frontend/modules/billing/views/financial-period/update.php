<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlFinancialPeriod */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Financial Period',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financial Period'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->period_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bl-financial-period-update">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model
        
    ]) ?>

</div>
</div>
</div>