<?php

namespace common\models;

use Yii;
use \common\models\base\ConceptAnswer as BaseConceptAnswer;

/**
 * This is the model class for table "concept_answer".
 */
class ConceptAnswer extends BaseConceptAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['concept_id',  'answer_drug', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['sort_weight'], 'number'],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ]);
    }
	
}
