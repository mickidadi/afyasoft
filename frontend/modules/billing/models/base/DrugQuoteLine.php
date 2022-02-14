<?php

namespace frontend\modules\billing\models\base;

use Yii;
use common\models\BlSaleQuoteLine;
use frontend\modules\pharmancy\models\Drug;

/**
 * This is the base model class for table "drug_quote_line".
 *
 * @property integer $quote_line_id
 * @property integer $drug_inventory_id
 * @property double $dose
 * @property integer $as_needed
 * @property string $dosing_type
 * @property double $quantity
 * @property string $as_needed_condition
 * @property integer $num_refills
 * @property string $dosing_instructions
 * @property integer $duration
 * @property integer $duration_units
 * @property integer $quantity_units
 * @property integer $route
 * @property integer $dose_units
 * @property integer $frequency
 * @property string $brand_name
 * @property integer $dispense_as_written
 * @property string $drug_non_coded
 *
 * @property \frontend\modules\billing\models\Drug $drugInventory
 * @property \frontend\modules\billing\models\BlSaleQuoteLine $quoteLine
 */
class DrugQuoteLine extends \yii\db\ActiveRecord
{
  
    use \mootensai\relation\RelationTrait;

 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'drugInventory',
            'quoteLine'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug_inventory_id',  'duration', 'duration_units','route','dose', 'dose_units', 'frequency'], 'required'],
            [['quote_line_id', 'drug_inventory_id', 'as_needed', 'num_refills', 'duration', 'duration_units', 'quantity_units', 'route', 'dose_units', 'frequency'], 'integer'],
            [['dose', 'quantity'], 'number'],
            [['dosing_instructions'], 'string'],
            [['dosing_type', 'as_needed_condition', 'brand_name', 'drug_non_coded'], 'string', 'max' => 255],
            [['dispense_as_written'], 'string', 'max' => 1],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_quote_line';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quote_line_id' => Yii::t('app', 'Quote Line ID'),
            'drug_inventory_id' => Yii::t('app', 'Drug Inventory ID'),
            'dose' => Yii::t('app', 'Dose'),
            'as_needed' => Yii::t('app', 'As Needed'),
            'dosing_type' => Yii::t('app', 'Dosing Type'),
            'quantity' => Yii::t('app', 'Quantity'),
            'as_needed_condition' => Yii::t('app', 'As Needed Condition'),
            'num_refills' => Yii::t('app', 'Num Refills'),
            'dosing_instructions' => Yii::t('app', 'Dosing Instructions'),
            'duration' => Yii::t('app', 'Duration'),
            'duration_units' => Yii::t('app', 'Duration Units'),
            'quantity_units' => Yii::t('app', 'Quantity Units'),
            'route' => Yii::t('app', 'Route'),
            'dose_units' => Yii::t('app', 'Dose Units'),
            'frequency' => Yii::t('app', 'Frequency'),
            'brand_name' => Yii::t('app', 'Brand Name'),
            'dispense_as_written' => Yii::t('app', 'Dispense As Written'),
            'drug_non_coded' => Yii::t('app', 'Drug Non Coded'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugInventory()
    {
        return $this->hasOne(Drug::className(), ['drug_id' => 'drug_inventory_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuoteLine()
    {
        return $this->hasOne(BlSaleQuoteLine::className(), ['quote_line_id' => 'quote_line_id']);
    }
    
    
}
