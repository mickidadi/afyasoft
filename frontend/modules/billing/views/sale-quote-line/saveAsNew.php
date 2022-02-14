<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuoteLine */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Bl Sale Quote Line',
]). ' ' . $model->quote_line_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Quote Line'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quote_line_id, 'url' => ['view', 'id' => $model->quote_line_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="bl-sale-quote-line-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
