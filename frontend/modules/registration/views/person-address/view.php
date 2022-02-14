<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonAddress */

$this->title = $model->person_address_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->person_address_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->person_address_id], [
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
            'person_address_id',
            'person_id',
            'preferred',
            'address1',
            'address2',
            'city_village',
            'state_province',
            'postal_code',
            'country',
            'latitude',
            'longitude',
            'start_date',
            'end_date',
            'creator',
            'date_created',
            'voided',
            'voided_by',
            'date_voided',
            'void_reason',
            'county_district',
            'address3',
            'address4',
            'address5',
            'address6',
            'date_changed',
            'changed_by',
            'uuid',
            'address7',
            'address8',
            'address9',
            'address10',
            'address11',
            'address12',
            'address13',
            'address14',
            'address15',
        ],
    ]) ?>

</div>
