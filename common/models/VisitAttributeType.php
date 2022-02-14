<?php

namespace common\models;

use Yii;
use \common\models\base\VisitAttributeType as BaseVisitAttributeType;

/**
 * This is the model class for table "visit_attribute_type".
 */
class VisitAttributeType extends BaseVisitAttributeType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'min_occurs', 'creator', 'date_created', 'uuid'], 'required'],
            [['datatype_config', 'handler_config'], 'string'],
            [['min_occurs', 'max_occurs', 'creator', 'changed_by', 'retired_by'], 'integer'],
            [['date_created', 'date_changed', 'date_retired'], 'safe'],
            [['name', 'datatype', 'preferred_handler', 'retire_reason'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1024],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
