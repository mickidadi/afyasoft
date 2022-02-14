<?php

namespace common\models\base;

use Yii;
use common\models\BlServiceType;
use common\models\BlSaleQuoteLine;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;
use frontend\modules\billing\models\BlPriceListVersion;

/**
 * This is the base model class for table "bl_item_price".
 *
 * @property integer $item_price_id
 * @property integer $price_list_version
 * @property integer $item
 * @property integer $service_type
 * @property integer $payment_category
 * @property integer $payment_sub_category
 * @property double $selling_price
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $retired
 * @property string $uuid
 *
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property \common\models\Concept $paymentCategory
 * @property \common\models\Concept $paymentSubCategory
 * @property \common\models\BlPriceListVersion $priceListVersion
 * @property \common\models\BlServiceType $serviceType
 * @property \common\models\BlSaleQuoteLine[] $blSaleQuoteLines
 */
class BlItemPrice extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'updatedBy',
            'createdBy',
            'paymentCategory',
            'paymentSubCategory',
            'priceListVersion',
            'serviceType',
            'blSaleQuoteLines'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_list_version', 'item', 'service_type', 'payment_category', 'payment_sub_category', 'selling_price'], 'required'],
            [['price_list_version', 'item', 'service_type', 'payment_category', 'payment_sub_category', 'created_by', 'updated_by', 'retired'], 'integer'],
            [['selling_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bl_item_price';
    }
 

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_price_id' => Yii::t('app', 'Item Price ID'),
            'price_list_version' => Yii::t('app', 'Price List Version'),
            'item' => Yii::t('app', 'Item'),
            'service_type' => Yii::t('app', 'Service Type'),
            'payment_category' => Yii::t('app', 'Payment Category'),
            'payment_sub_category' => Yii::t('app', 'Payment Sub Category'),
            'selling_price' => Yii::t('app', 'Selling Price'),
            'retired' => Yii::t('app', 'Retired'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentCategory()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'payment_category']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentSubCategory()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'payment_sub_category']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceListVersion()
    {
        return $this->hasOne(BlPriceListVersion::className(), ['id' => 'price_list_version']);
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
    public function getBlSaleQuoteLines()
    {
        return $this->hasMany(BlSaleQuoteLine::className(), ['item_price' => 'item_price_id']);
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
