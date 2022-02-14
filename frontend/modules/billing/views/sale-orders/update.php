<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleOrders */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bl Sale Orders',
]) . ' ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bl-sale-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
