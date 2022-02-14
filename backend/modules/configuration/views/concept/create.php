<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Concept */

$this->title = Yii::t('app', 'Create Concept');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concepts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concept-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_concept_set' => $model_concept_set,
        'model_concept_answer' => $model_concept_answer,
        'model_concept_numeric' => $model_concept_numeric,
    ]) ?>

</div>
