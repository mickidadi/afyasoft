<?php

namespace frontend\modules\billing\models;

use Yii;
use \frontend\modules\billing\models\base\BlPriceListVersion as BaseBlPriceListVersion;

/**
 * This is the model class for table "bl_price_list_version".
 */
class BlPriceListVersion extends BaseBlPriceListVersion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['financial_period_id', 'version_name', 'status', 'created_by', 'created_at', 'uuid'], 'required'],
            [['financial_period_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['version_name'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
           
             
        ]);
    }
	
}
