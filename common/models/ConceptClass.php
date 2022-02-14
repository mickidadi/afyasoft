<?php

namespace common\models;

use Yii;
use \common\models\base\ConceptClass as BaseConceptClass;

/**
 * This is the model class for table "concept_class".
 */
class ConceptClass extends BaseConceptClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_by', 'retired_by', 'updated_by'], 'integer'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'date_retired', 'updated_at'], 'safe'],
            [['name', 'description', 'retire_reason'], 'string', 'max' => 255],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ]);
    }
	
}
