<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonAddress */

$this->title = Yii::t('app', 'Create Person Address');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
