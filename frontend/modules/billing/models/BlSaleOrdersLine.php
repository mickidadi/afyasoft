<?php

namespace frontend\modules\billing\models;

use Yii;
use \frontend\modules\billing\models\base\BlSaleOrdersLine as BaseBlSaleOrdersLine;

/**
 * This is the model class for table "bl_sale_orders_line".
 */
class BlSaleOrdersLine extends BaseBlSaleOrdersLine
{
    /**
     * @inheritdoc
     */
    public $payable_amount;
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['sale_orders_id', 'sale_quote_line_id', 'created_by', 'updated_by', 'payment_status', 'payment_method'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'required'],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
        ]);
    }
	
}
