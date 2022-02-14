<?php

namespace frontend\modules\clinical\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bl_sale_quote_line".
 *
 * @property integer $quote_line_id
 * @property integer $sale_quote
 * @property integer $item
 * @property integer $service_type
 * @property integer $item_price
 * @property integer $quantity
 * @property string $unit
 * @property double $quoted_amount
 * @property double $payable_amount
 * @property integer $payment_category
 * @property integer $payment_sub_category
 * @property integer $status
 * @property double $dose
 * @property integer $dose_units
 * @property integer $duration
 * @property integer $duration_units
 * @property integer $route
 * @property integer $frequency
 * @property string $comment
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $uuid
 *
 * @property \frontend\modules\clinical\models\BlDiscount[] $blDiscounts
 * @property \frontend\modules\clinical\models\BlSaleOrderByQuoteLine $blSaleOrderByQuoteLine
 * @property \frontend\modules\clinical\models\User $createdBy
 * @property \frontend\modules\clinical\models\BlItemPrice $itemPrice
 * @property \frontend\modules\clinical\models\Concept $paymentCategory
 * @property \frontend\modules\clinical\models\Concept $paymentSubCategory
 * @property \frontend\modules\clinical\models\BlSaleQuote $saleQuote
 * @property \frontend\modules\clinical\models\BlServiceType $serviceType
 * @property \frontend\modules\clinical\models\BlQuoteStatusCode $status0
 * @property \frontend\modules\clinical\models\BlSaleQuoteReferenceMap[] $blSaleQuoteReferenceMaps
 * @property \frontend\modules\clinical\models\DrugQuoteLine $drugQuoteLine
 */
class NonDrug extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

   

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'blDiscounts',
            'blSaleOrderByQuoteLine',
            'createdBy',
            'itemPrice',
            'paymentCategory',
            'paymentSubCategory',
            'saleQuote',
            'serviceType',
            'status0',
            'blSaleQuoteReferenceMaps',
            'drugQuoteLine'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_quote', 'item', 'service_type', 'item_price', 'quantity', 'payment_category', 'payment_sub_category', 'status', 'created_at', 'uuid'], 'required'],
            [['sale_quote', 'item', 'service_type', 'item_price', 'quantity', 'payment_category', 'payment_sub_category', 'status', 'dose_units', 'duration', 'duration_units', 'route', 'frequency', 'created_by', 'updated_by'], 'integer'],
            [['quoted_amount', 'payable_amount', 'dose'], 'number'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['unit'], 'string', 'max' => 25],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bl_sale_quote_line';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quote_line_id' => Yii::t('app', 'Quote Line ID'),
            'sale_quote' => Yii::t('app', 'Sale Quote'),
            'item' => Yii::t('app', 'Item'),
            'service_type' => Yii::t('app', 'Service Type'),
            'item_price' => Yii::t('app', 'Item Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'unit' => Yii::t('app', 'Unit'),
            'quoted_amount' => Yii::t('app', 'Quoted Amount'),
            'payable_amount' => Yii::t('app', 'Payable Amount'),
            'payment_category' => Yii::t('app', 'Payment Category'),
            'payment_sub_category' => Yii::t('app', 'Payment Sub Category'),
            'status' => Yii::t('app', 'Status'),
            'dose' => Yii::t('app', 'Dose'),
            'dose_units' => Yii::t('app', 'Dose Units'),
            'duration' => Yii::t('app', 'Duration'),
            'duration_units' => Yii::t('app', 'Duration Units'),
            'route' => Yii::t('app', 'Route'),
            'frequency' => Yii::t('app', 'Frequency'),
            'comment' => Yii::t('app', 'Comment'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlDiscounts()
    {
       // return $this->hasMany(BlDiscount::className(), ['quote_line' => 'quote_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlSaleOrderByQuoteLine()
    {
       // return $this->hasOne(BlSaleOrderByQuoteLine::className(), ['quote_line' => 'quote_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemPrice()
    {
        return $this->hasOne(BlItemPrice::className(), ['item_price_id' => 'item_price']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentCategory()
    {
        return $this->hasOne(Concept::className(), ['concept_id' => 'payment_category']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentSubCategory()
    {
        return $this->hasOne(Concept::className(), ['concept_id' => 'payment_sub_category']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleQuote()
    {
        return $this->hasOne(BlSaleQuote::className(), ['quote_id' => 'sale_quote']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceType()
    {
        return $this->hasOne(BlServiceType::className(), ['service_type_id' => 'service_type']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(BlQuoteStatusCode::className(), ['status_code_id' => 'status']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlSaleQuoteReferenceMaps()
    {
       //s return $this->hasMany(BlSaleQuoteReferenceMap::className(), ['sale_quote_line' => 'quote_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugQuoteLine()
    {
        return $this->hasOne(DrugQuoteLine::className(), ['quote_line_id' => 'quote_line_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'uuid',
            ],
        ];
    }
}
