<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlFinancialPeriod */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Bl Financial Period',
]). ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Financial Period'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->period_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="bl-financial-period-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
