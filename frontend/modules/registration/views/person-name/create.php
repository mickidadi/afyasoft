<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonName */

$this->title = Yii::t('app', 'Create Person Name');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
