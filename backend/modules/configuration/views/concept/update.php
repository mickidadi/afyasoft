<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Concept */

$this->title = Yii::t('app', 'Update Concept: {name}', [
    'name' => $model->concept_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concepts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->concept_id, 'url' => ['view', 'id' => $model->concept_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="concept-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
