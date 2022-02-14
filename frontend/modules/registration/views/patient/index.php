<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\registration\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'List of Patients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
             
    <p>
        <?= Html::a(Yii::t('app', 'Register New Patient'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'patient_id',
            [
                'attribute' => 'firstName',
                'label'=>"First Name",
                'format'=>'raw',
                'vAlign' => 'middle',
                
                // 'width' => '200px',
                'value' => function ($model) {
                return Html::a($model->patient->given_name, ['view', 'id' =>$model->patient_id]);
                },
                ],
                [
                    'attribute' => 'middleName',
                    'label'=>"Middle Name",
                    'format'=>'raw',
                    'vAlign' => 'middle',
                    
                    // 'width' => '200px',
                    'value' => function ($model) {
                    
                    return Html::a($model->patient->middle_name,['view', 'id' =>$model->patient_id]);
                    },
                    ],
                    [
                        'attribute' => 'lastName',
                        'label'=>"Last Name",
                        'format'=>'raw',
                        'vAlign' => 'middle',
                        
                        // 'width' => '200px',
                        'value' => function ($model) {
                        
                        return Html::a($model->patient->family_name,['view', 'id' =>$model->patient_id]);
                        },
                    ],
                    'phone_number',
                    [
                        'attribute' => 'gender',
                        'label' => Yii::t('app', 'Gender'),
                        'value' => function($model){                   
                            return $model->patient->gender;                   
                        },
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter' =>["M"=>"M","F"=>"F"],
                        'filterWidgetOptions' => [
                            'pluginOptions' => ['allowClear' => true],
                        ],
                        'filterInputOptions' => ['placeholder' => 'Gender', 'id' => '-search-genders']
                    ],

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}{view}'],
        ],
    ]); ?>


</div>
    </div>
    </div>