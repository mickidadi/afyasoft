<?php

namespace common\models;

use Yii;
use common\models\Visit;
use common\models\VisitAttribute;
use \common\models\base\Visit as BaseVisit;

/**
 * This is the model class for table "visit".
 */
class Visit extends BaseVisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['patient_id', 'visit_type_id'], 'required'],
            [['patient_id', 'visit_type_id', 'indication_concept_id', 'location_id', 'created_by', 'updated_by', 'voided_by'], 'integer'],
            [['date_started', 'date_stopped', 'created_at', 'updated_at', 'date_voided'], 'safe'],
            [['voided'], 'string', 'max' => 1],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            
        ]);
    }
	public static function getVisitIdByPatientId($patient_id){
        $model=Visit::find()->where(["patient_id"=>$patient_id])->orderBy("visit_id DESC")->one();

        return $model->visit_id;
   }
   public static function getVisitattributeIdByVisitId($visit_id){
    $model=VisitAttribute::find()->where(["visit_id"=>$visit_id])->orderBy("visit_attribute_id DESC")->one();

    return $model;
}
}
