<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonAddress */

$this->title = Yii::t('app', 'Update Person Address: {name}', [
    'name' => $model->person_address_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_address_id, 'url' => ['view', 'id' => $model->person_address_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="person-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
