<?php

namespace frontend\modules\clinical\models;

use Yii;
use \frontend\modules\clinical\models\base\PatientCondition as BasePatientCondition;

/**
 * This is the model class for table "patient_diagnosis".
 */
class PatientCondition extends BasePatientCondition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['condition_date','concept_id', 'status'], 'required'],
            [['patient_id', 'visit_id', 'concept_id', 'orders', 'certainty', 'status', 'created_by', 'updated_by','diagnosis_type'], 'integer'],
            [['comment'], 'string'],
            [['condition_date', 'created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 100],
            [['uuid'], 'unique'],
           
        ]);
    }
	
}
