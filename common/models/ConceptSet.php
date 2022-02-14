<?php

namespace common\models;

use Yii;
use \common\models\base\ConceptSet as BaseConceptSet;

/**
 * This is the model class for table "concept_set".
 */
class ConceptSet extends BaseConceptSet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['concept_id', 'concept_set', 'created_by', 'updated_by'], 'integer'],
            [['sort_weight'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'required'],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ]);
    }
	
}
