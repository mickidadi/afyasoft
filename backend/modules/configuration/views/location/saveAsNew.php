<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Location */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Location',
]). ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->location_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
