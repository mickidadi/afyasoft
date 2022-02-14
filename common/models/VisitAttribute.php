<?php

namespace common\models;

use Yii;
use \common\models\base\VisitAttribute as BaseVisitAttribute;

/**
 * This is the model class for table "visit_attribute".
 */
class VisitAttribute extends BaseVisitAttribute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['visit_id', 'attribute_type_id'], 'required'],
            [['visit_id', 'payment_category_concept_id', 'insurance_concept_id', 'track_scheme_concept_id', 'attribute_type_id', 'created_by', 'updated_by', 'voided_by'], 'integer'],
            [['value_reference'], 'string'],
            [['created_at', 'updated_at', 'date_voided','location_id'], 'safe'],
            [['insurance_number'], 'string', 'max' => 30],
            [['uuid'], 'string', 'max' => 38],
            [['voided'], 'string', 'max' => 1],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'unique'],
          
        ]);
    }
	
}
