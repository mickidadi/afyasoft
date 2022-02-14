<?php

namespace frontend\modules\clinical\models;

use Yii;
use \frontend\modules\clinical\models\base\PatientConsultation as BasePatientConsultation;

/**
 * This is the model class for table "patient_consultation".
 */
class PatientConsultation extends BasePatientConsultation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['comment'], 'required'],
            [['visit_id', 'patient_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 100],
            [['uuid'], 'unique'],
        ]);
    }
	
}
