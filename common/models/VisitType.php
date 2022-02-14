<?php

namespace common\models;

use Yii;
use \common\models\base\VisitType as BaseVisitType;

/**
 * This is the model class for table "visit_type".
 */
class VisitType extends BaseVisitType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['created_by', 'updated_by', 'retired_by'], 'integer'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['name', 'retire_reason'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1024],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
             
        ]);
    }
	
}
