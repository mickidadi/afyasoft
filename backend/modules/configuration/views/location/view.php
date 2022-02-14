<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Location */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Location').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->location_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->location_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->location_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
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
    
    <div class="row">
<?php
if($providerAppointmentService->totalCount){
    $gridColumnAppointmentService = [
        ['class' => 'yii\grid\SerialColumn'],
            'appointment_service_id',
            'name',
            'description:ntext',
            'start_time',
            'end_time',
                        [
                'attribute' => 'speciality.name',
                'label' => Yii::t('app', 'Speciality')
            ],
            'max_appointments_limit',
            'duration_mins',
            'color',
            'date_created',
            'creator',
            'date_changed',
            'changed_by',
            'voided',
            'voided_by',
            'date_voided',
            'void_reason',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerAppointmentService,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-appointment-service']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Appointment Service')),
        ],
        'export' => false,
        'columns' => $gridColumnAppointmentService
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerBedLocationMap->totalCount){
    $gridColumnBedLocationMap = [
        ['class' => 'yii\grid\SerialColumn'],
            'bed_location_map_id',
                        'row_number',
            'column_number',
            [
                'attribute' => 'bed.bed_id',
                'label' => Yii::t('app', 'Bed')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBedLocationMap,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-bed-location-map']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Bed Location Map')),
        ],
        'export' => false,
        'columns' => $gridColumnBedLocationMap
    ]);
}
?>

    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'password_hash',
        'auth_key',
        'secret_question',
        'secret_answer',
        'person_id',
        'status',
        'retired',
        [
            'attribute' => 'retiredBy.username',
            'label' => Yii::t('app', 'Retired By'),
        ],
        'date_retired',
        'retire_reason',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->changedBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>Location<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnLocation = [
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
        'model' => $model->parentLocation,
        'attributes' => $gridColumnLocation    ]);
    ?>
    
    <div class="row">
<?php
if($providerLocation->totalCount){
    $gridColumnLocation = [
        ['class' => 'yii\grid\SerialColumn'],
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
                'label' => Yii::t('app', 'Creator')
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
                'label' => Yii::t('app', 'Retired By')
            ],
            'date_retired',
            'retire_reason',
                        'uuid',
            [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
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
    echo Gridview::widget([
        'dataProvider' => $providerLocation,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-location']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Location')),
        ],
        'export' => false,
        'columns' => $gridColumnLocation
    ]);
}
?>

    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'password_hash',
        'auth_key',
        'secret_question',
        'secret_answer',
        'person_id',
        'status',
        'retired',
        [
            'attribute' => 'retiredBy.username',
            'label' => Yii::t('app', 'Retired By'),
        ],
        'date_retired',
        'retire_reason',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->creator0,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'password_hash',
        'auth_key',
        'secret_question',
        'secret_answer',
        'person_id',
        'status',
        'retired',
        'date_retired',
        'retire_reason',
        'uuid',
    ];
    echo DetailView::widget([
        'model' => $model->retiredBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    
    <div class="row">
<?php
if($providerLocationTagMap->totalCount){
    $gridColumnLocationTagMap = [
        ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute' => 'locationTag.name',
                'label' => Yii::t('app', 'Location Tag')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerLocationTagMap,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-location-tag-map']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Location Tag Map')),
        ],
        'export' => false,
        'columns' => $gridColumnLocationTagMap
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerObs->totalCount){
    $gridColumnObs = [
        ['class' => 'yii\grid\SerialColumn'],
            'obs_id',
            [
                'attribute' => 'person.person_id',
                'label' => Yii::t('app', 'Person')
            ],
            [
                'attribute' => 'concept.concept_id',
                'label' => Yii::t('app', 'Concept')
            ],
            'encounter_id',
            [
                'attribute' => 'order.order_id',
                'label' => Yii::t('app', 'Order')
            ],
            'obs_datetime',
                        [
                'attribute' => 'obsGroup.obs_id',
                'label' => Yii::t('app', 'Obs Group')
            ],
            'accession_number',
            'value_group_id',
            [
                'attribute' => 'valueCoded.concept_id',
                'label' => Yii::t('app', 'Value Coded')
            ],
            'value_coded_name_id',
            [
                'attribute' => 'valueDrug.name',
                'label' => Yii::t('app', 'Value Drug')
            ],
            'value_datetime',
            'value_numeric',
            'value_modifier',
            'value_text:ntext',
            'value_complex',
            'comments',
            [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
            'date_created',
            'voided',
            [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
            'date_voided',
            'void_reason',
            'uuid',
            [
                'attribute' => 'previousVersion.obs_id',
                'label' => Yii::t('app', 'Previous Version')
            ],
            'form_namespace_and_path',
            'status',
            'interpretation',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerObs,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-obs']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Obs')),
        ],
        'export' => false,
        'columns' => $gridColumnObs
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerPatientAppointment->totalCount){
    $gridColumnPatientAppointment = [
        ['class' => 'yii\grid\SerialColumn'],
            'patient_appointment_id',
            'provider_id',
            'appointment_number',
            [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
            'start_date_time',
            'end_date_time',
            [
                'attribute' => 'appointmentService.name',
                'label' => Yii::t('app', 'Appointment Service')
            ],
            [
                'attribute' => 'appointmentServiceType.name',
                'label' => Yii::t('app', 'Appointment Service Type')
            ],
            'status',
                        'appointment_kind',
            'comments',
            'uuid',
            'date_created',
            'creator',
            'date_changed',
            'changed_by',
            'voided',
            'voided_by',
            'date_voided',
            'void_reason',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPatientAppointment,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-patient-appointment']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Patient Appointment')),
        ],
        'export' => false,
        'columns' => $gridColumnPatientAppointment
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerPatientIdentifier->totalCount){
    $gridColumnPatientIdentifier = [
        ['class' => 'yii\grid\SerialColumn'],
            'patient_identifier_id',
            [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
            'identifier',
            [
                'attribute' => 'entifierType.name',
                'label' => Yii::t('app', 'Identifier Type')
            ],
            'preferred',
                        [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
            'date_created',
            'date_changed',
            [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
            ],
            'voided',
            [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
            'date_voided',
            'void_reason',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPatientIdentifier,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-patient-identifier']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Patient Identifier')),
        ],
        'export' => false,
        'columns' => $gridColumnPatientIdentifier
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerPatientProgram->totalCount){
    $gridColumnPatientProgram = [
        ['class' => 'yii\grid\SerialColumn'],
            'patient_program_id',
            [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
            [
                'attribute' => 'program.name',
                'label' => Yii::t('app', 'Program')
            ],
            'date_enrolled',
            'date_completed',
                        [
                'attribute' => 'outcomeConcept.concept_id',
                'label' => Yii::t('app', 'Outcome Concept')
            ],
            [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
            'date_created',
            [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
            ],
            'date_changed',
            'voided',
            [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
            'date_voided',
            'void_reason',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPatientProgram,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-patient-program']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Patient Program')),
        ],
        'export' => false,
        'columns' => $gridColumnPatientProgram
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerSurgicalBlock->totalCount){
    $gridColumnSurgicalBlock = [
        ['class' => 'yii\grid\SerialColumn'],
            'surgical_block_id',
            'primary_provider_id',
                        'start_datetime',
            'end_datetime',
            [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
            'date_created',
            [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
            ],
            'date_changed',
            'voided',
            [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
            'date_voided',
            'void_reason',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSurgicalBlock,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-surgical-block']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Surgical Block')),
        ],
        'export' => false,
        'columns' => $gridColumnSurgicalBlock
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerVisit->totalCount){
    $gridColumnVisit = [
        ['class' => 'yii\grid\SerialColumn'],
            'visit_id',
            [
                'attribute' => 'patient.patient_id',
                'label' => Yii::t('app', 'Patient')
            ],
            [
                'attribute' => 'visitType.name',
                'label' => Yii::t('app', 'Visit Type')
            ],
            'date_started',
            'date_stopped',
            [
                'attribute' => 'indicationConcept.concept_id',
                'label' => Yii::t('app', 'Indication Concept')
            ],
                        [
                'attribute' => 'creator0.username',
                'label' => Yii::t('app', 'Creator')
            ],
            'date_created',
            [
                'attribute' => 'changedBy.username',
                'label' => Yii::t('app', 'Changed By')
            ],
            'date_changed',
            'voided',
            [
                'attribute' => 'voidedBy.username',
                'label' => Yii::t('app', 'Voided By')
            ],
            'date_voided',
            'void_reason',
            'uuid',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerVisit,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-visit']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Visit')),
        ],
        'export' => false,
        'columns' => $gridColumnVisit
    ]);
}
?>

    </div>
</div>
