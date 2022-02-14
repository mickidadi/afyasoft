<?php

namespace common\models;

use Yii;
use \common\models\base\BlSaleQuoteLine as BaseBlSaleQuoteLine;

/**
 * This is the model class for table "bl_sale_quote_line".
 */
class BlSaleQuoteLine extends BaseBlSaleQuoteLine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['sale_quote', 'item', 'service_type',  'payment_category', 'payment_sub_category'], 'required'],
            [['sale_quote', 'item', 'service_type', 'item_price', 'quantity', 'payment_category', 'payment_sub_category', 'status', 'dose_units', 'duration', 'duration_units', 'route', 'frequency', 'created_by', 'updated_by'], 'integer'],
            [['quoted_amount', 'payable_amount', 'dose'], 'number'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['unit'], 'string', 'max' => 25],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            
        ]);
    }
	
}
