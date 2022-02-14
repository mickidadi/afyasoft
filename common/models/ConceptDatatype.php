<?php

namespace common\models;

use Yii;
use \common\models\base\ConceptDatatype as BaseConceptDatatype;

/**
 * This is the model class for table "concept_datatype".
 */
class ConceptDatatype extends BaseConceptDatatype
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_by', 'updated_by', 'retired_by'], 'integer'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['uuid'], 'required'],
            [['name', 'description', 'retire_reason'], 'string', 'max' => 255],
            [['hl7_abbreviation'], 'string', 'max' => 3],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ]);
    }
	
}
