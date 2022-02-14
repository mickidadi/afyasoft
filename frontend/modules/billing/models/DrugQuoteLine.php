<?php

namespace frontend\modules\billing\models;

use Yii;
use \frontend\modules\billing\models\base\DrugQuoteLine as BaseDrugQuoteLine;

/**
 * This is the model class for table "drug_quote_line".
 */
class DrugQuoteLine extends BaseDrugQuoteLine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['drug_inventory_id',  'duration', 'duration_units','route','dose', 'dose_units', 'frequency'], 'required'],
            [['quote_line_id', 'drug_inventory_id', 'as_needed', 'num_refills', 'duration', 'duration_units', 'quantity_units', 'route', 'dose_units', 'frequency'], 'integer'],
            [['dose', 'quantity'], 'number'],
            [['dosing_instructions'], 'string'],
            [['dosing_type', 'as_needed_condition', 'brand_name', 'drug_non_coded'], 'string', 'max' => 255],
            [['dispense_as_written'], 'string', 'max' => 1],
            
        ]);
    }
	
}
