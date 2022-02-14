<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\PersonAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'person_address_id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'preferred') ?>

    <?= $form->field($model, 'address1') ?>

    <?= $form->field($model, 'address2') ?>

    <?php // echo $form->field($model, 'city_village') ?>

    <?php // echo $form->field($model, 'state_province') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'creator') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'voided') ?>

    <?php // echo $form->field($model, 'voided_by') ?>

    <?php // echo $form->field($model, 'date_voided') ?>

    <?php // echo $form->field($model, 'void_reason') ?>

    <?php // echo $form->field($model, 'county_district') ?>

    <?php // echo $form->field($model, 'address3') ?>

    <?php // echo $form->field($model, 'address4') ?>

    <?php // echo $form->field($model, 'address5') ?>

    <?php // echo $form->field($model, 'address6') ?>

    <?php // echo $form->field($model, 'date_changed') ?>

    <?php // echo $form->field($model, 'changed_by') ?>

    <?php // echo $form->field($model, 'uuid') ?>

    <?php // echo $form->field($model, 'address7') ?>

    <?php // echo $form->field($model, 'address8') ?>

    <?php // echo $form->field($model, 'address9') ?>

    <?php // echo $form->field($model, 'address10') ?>

    <?php // echo $form->field($model, 'address11') ?>

    <?php // echo $form->field($model, 'address12') ?>

    <?php // echo $form->field($model, 'address13') ?>

    <?php // echo $form->field($model, 'address14') ?>

    <?php // echo $form->field($model, 'address15') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
