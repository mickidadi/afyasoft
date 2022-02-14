<?php

namespace common\models;

use Yii;
use \common\models\base\BlServiceType as BaseBlServiceType;

/**
 * This is the model class for table "bl_service_type".
 */
class BlServiceType extends BaseBlServiceType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'creator', 'date_created', 'uuid'], 'required'],
            [['creator', 'changed_by', 'retired'], 'integer'],
            [['date_created', 'date_changed'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 58],
            [['name'], 'unique'],
            [['uuid'], 'unique'],
            [['uuid'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
