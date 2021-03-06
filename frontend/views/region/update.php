<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Region */

$this->title = Yii::t('app', 'Update Region: {name}', [
    'name' => $model->region_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->region_id, 'url' => ['view', 'id' => $model->region_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
