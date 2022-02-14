<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuote */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Bl Sale Quote',
]). ' ' . $model->quote_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Quote'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quote_id, 'url' => ['view', 'id' => $model->quote_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="bl-sale-quote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
