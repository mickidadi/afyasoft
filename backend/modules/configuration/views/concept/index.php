<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\configuration\models\ConceptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Concepts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concept-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Concept'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'concept_id',
            'concept_name_en',
            'concept_name_type',
            'retired',
            'short_name',
            //'description:ntext',
            //'form_text:ntext',
            'datatype_id',
            'class_id',
            //'is_set',
            //'created_by',
            //'created_at',
            //'version',
            //'updated_by',
            //'updated_at',
            //'retired_by',
            //'date_retired',
            //'retire_reason',
            //'uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
