<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = $model->person_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->person_id], [
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
            'person_id',
            'gender',
            'birthdate',
            'birthdate_estimated',
            'dead',
            'death_date',
            'cause_of_death',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'voided',
            'voided_by',
            'date_voided',
            'void_reason',
            'uuid',
            'deathdate_estimated',
            'birthtime',
        ],
    ]) ?>

</div>
