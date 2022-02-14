<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonName */

$this->title = Yii::t('app', 'Update Person Name: {name}', [
    'name' => $model->person_name_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_name_id, 'url' => ['view', 'id' => $model->person_name_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="person-name-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
