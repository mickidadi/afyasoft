<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientCondition */

$this->title = Yii::t('app', 'Create Patient Condition');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Condition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-condition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
