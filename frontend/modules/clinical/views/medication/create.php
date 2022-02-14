<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\DrugQuoteLine */

$this->title = Yii::t('app', 'Drug Quote Line');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drug Quote Line'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-quote-line-create">
<div class="panel panel-info">
        <div class="panel-heading">
         <?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label>
        </div>
        <div class="panel-body">
             

    <?= $this->render('_form', [
        'model' => $model,
        'patient_uuid'=>$patient_uuid
    ]);
    
   echo "<iframe src='" . \yii\helpers\Url::to(['/billing/sale-quote-line/index', 'patient_uuid'=>$patient_uuid]) . "' width='100%' height='675px'></iframe>";
     ?>
<?php /*= $this->render('index', [
        'patient_uuid'=>$patient_uuid
    ])*/ ?>
 
</div>
</div>
</div>