<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlPriceListVersion */

$this->title = Yii::t('app', 'Create Bl Price List Version');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bl Price List Version'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bl-price-list-version-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
