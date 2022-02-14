<?php

namespace frontend\modules\billing\models;

use Yii;
use \frontend\modules\billing\models\base\BlFinancialPeriod as BaseBlFinancialPeriod;

/**
 * This is the model class for table "bl_financial_period".
 */
class BlFinancialPeriod extends BaseBlFinancialPeriod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'start_date', 'end_date', 'status'], 'required'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            [['name'], 'unique'],
             
        ]);
    }
	
}
