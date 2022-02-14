<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlPriceListVersion */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Bl Price List Version',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Price List Version'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="bl-price-list-version-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
