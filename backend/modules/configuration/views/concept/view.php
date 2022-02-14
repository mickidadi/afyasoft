<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Concept */

$this->title = $model->concept_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Concepts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="concept-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->concept_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->concept_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'concept_id',
            'concept_name_en',
            'concept_name_type',
            'retired',
            'short_name',
            'description:ntext',
            'form_text:ntext',
            'datatype_id',
            'class_id',
            'is_set',
            'created_by',
            'created_at',
            'version',
            'updated_by',
            'updated_at',
            'retired_by',
            'date_retired',
            'retire_reason',
            'uuid',
        ],
    ]) ?>

</div>
