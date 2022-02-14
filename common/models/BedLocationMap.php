<?php

namespace common\models;

use Yii;
use \common\models\base\BedLocationMap as BaseBedLocationMap;

/**
 * This is the model class for table "bed_location_map".
 */
class BedLocationMap extends BaseBedLocationMap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['location_id', 'row_number', 'column_number'], 'required'],
            [['location_id', 'row_number', 'column_number', 'bed_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
