<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlSaleOrders */

$this->title = Yii::t('app', 'Create Bl Sale Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-sale-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
