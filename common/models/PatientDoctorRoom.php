<?php

namespace common\models;

use Yii;
use \common\models\base\PatientDoctorRoom as BasePatientDoctorRoom;

/**
 * This is the model class for table "patient_doctor_room".
 */
class PatientDoctorRoom extends BasePatientDoctorRoom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['patient_id'], 'required'],
            [['patient_id', 'location_id', 'created_by', 'voided_by', 'updated_by', 'visit_id', 'status'], 'integer'],
            [['created_at', 'date_voided', 'updated_at'], 'safe'],
            [['voided'], 'string', 'max' => 1],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
             
        ]);
    }
	
}
