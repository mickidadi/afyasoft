<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlItemPrice */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bl Item Price',
]) . ' ' . $model->item_price_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Item Price'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_price_id, 'url' => ['view', 'id' => $model->item_price_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bl-item-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
