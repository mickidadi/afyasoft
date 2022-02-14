<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonName */

$this->title = $model->person_name_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-name-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->person_name_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->person_name_id], [
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
            'person_name_id',
            'preferred',
            'person_id',
            'prefix',
            'given_name',
            'middle_name',
            'family_name_prefix',
            'family_name',
            'family_name2',
            'family_name_suffix',
            'degree',
            'created_by',
            'created_at',
            'voided',
            'voided_by',
            'date_voided',
            'void_reason',
            'updated_by',
            'updated_at',
            'uuid',
        ],
    ]) ?>

</div>
