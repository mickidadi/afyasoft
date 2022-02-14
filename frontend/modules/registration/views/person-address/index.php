<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\registration\models\PersonAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Person Addresses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Person Address'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'person_address_id',
            'person_id',
            'preferred',
            'address1',
            'address2',
            //'city_village',
            //'state_province',
            //'postal_code',
            //'country',
            //'latitude',
            //'longitude',
            //'start_date',
            //'end_date',
            //'creator',
            //'date_created',
            //'voided',
            //'voided_by',
            //'date_voided',
            //'void_reason',
            //'county_district',
            //'address3',
            //'address4',
            //'address5',
            //'address6',
            //'date_changed',
            //'changed_by',
            //'uuid',
            //'address7',
            //'address8',
            //'address9',
            //'address10',
            //'address11',
            //'address12',
            //'address13',
            //'address14',
            //'address15',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
