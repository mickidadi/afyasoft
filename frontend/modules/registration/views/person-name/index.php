<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\registration\models\PersonNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Person Names');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-name-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Person Name'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'person_name_id',
            'preferred',
            'person_id',
            'prefix',
            'given_name',
            //'middle_name',
            //'family_name_prefix',
            //'family_name',
            //'family_name2',
            //'family_name_suffix',
            //'degree',
            //'created_by',
            //'created_at',
            //'voided',
            //'voided_by',
            //'date_voided',
            //'void_reason',
            //'updated_by',
            //'updated_at',
            //'uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
