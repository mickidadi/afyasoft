<?php

namespace common\models;

use Yii;
use \common\models\base\BlItemPrice as BaseBlItemPrice;

/**
 * This is the model class for table "bl_item_price".
 */
class BlItemPrice extends BaseBlItemPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['price_list_version', 'item', 'service_type', 'payment_category', 'payment_sub_category', 'selling_price'], 'required'],
            [['price_list_version', 'item', 'service_type', 'payment_category', 'payment_sub_category', 'created_by', 'updated_by', 'retired'], 'integer'],
            [['selling_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            
        ]);
    }
	
}
