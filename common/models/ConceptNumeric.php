<?php

namespace common\models;

use Yii;
use \common\models\base\ConceptNumeric as BaseConceptNumeric;

/**
 * This is the model class for table "concept_numeric".
 */
class ConceptNumeric extends BaseConceptNumeric
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['concept_id'], 'required'],
            [['concept_id', 'display_precision'], 'integer'],
            [['hi_absolute', 'hi_critical', 'hi_normal', 'low_absolute', 'low_critical', 'low_normal'], 'number'],
            [['units'], 'string', 'max' => 50],
            [['precise'], 'string', 'max' => 1]
        ]);
    }
	
}
