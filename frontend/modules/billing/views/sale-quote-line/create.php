<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuoteLine */

$this->title = Yii::t('app', 'Create Bl Sale Quote Line');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Quote Line'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-sale-quote-line-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
