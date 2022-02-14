<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\registration\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'People');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Person'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'person_id',
            'gender',
            'birthdate',
            'birthdate_estimated',
            'dead',
            //'death_date',
            //'cause_of_death',
            //'created_by',
            //'created_at',
            //'updated_by',
            //'updated_at',
            //'voided',
            //'voided_by',
            //'date_voided',
            //'void_reason',
            //'uuid',
            //'deathdate_estimated',
            //'birthtime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
