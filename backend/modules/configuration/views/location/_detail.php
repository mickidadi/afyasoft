<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Location */

?>
<div class="location-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'location_id',
        'name',
        'description',
        'address1',
        'address2',
        'city_village',
        'state_province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        [
            'attribute' => 'creator0.username',
            'label' => Yii::t('app', 'Creator'),
        ],
        'date_created',
        'county_district',
        'address3',
        'address4',
        'address5',
        'address6',
        'retired',
        [
            'attribute' => 'retiredBy.username',
            'label' => Yii::t('app', 'Retired By'),
        ],
        'date_retired',
        'retire_reason',
        [
            'attribute' => 'parentLocation.name',
            'label' => Yii::t('app', 'Parent Location'),
        ],
        'uuid',
        [
            'attribute' => 'changedBy.username',
            'label' => Yii::t('app', 'Changed By'),
        ],
        'date_changed',
        'address7',
        'address8',
        'address9',
        'address10',
        'address11',
        'address12',
        'address13',
        'address14',
        'address15',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>