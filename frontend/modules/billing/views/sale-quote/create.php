<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlSaleQuote */

$this->title = Yii::t('app', 'Create Bl Sale Quote');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Sale Quote'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-sale-quote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
