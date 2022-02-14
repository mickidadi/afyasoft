<?php

namespace frontend\modules\clinical\models;

use Yii;
use \frontend\modules\clinical\models\base\PatientDiagnosis as BasePatientDiagnosis;

/**
 * This is the model class for table "patient_diagnosis".
 */
class PatientDiagnosis extends BasePatientDiagnosis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['concept_id','orders', 'certainty', 'status'], 'required'],
            [['patient_id', 'visit_id', 'concept_id', 'orders', 'certainty', 'status', 'created_by', 'updated_by','diagnosis_type'], 'integer'],
            [['comment'], 'string'],
            [['condition_date', 'created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 100],
            [['uuid'], 'unique'],
           
        ]);
    }
	
}
