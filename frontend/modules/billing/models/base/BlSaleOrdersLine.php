<?php

namespace frontend\modules\billing\models\base;

use Yii;
use common\models\BlSaleQuoteLine;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bl_sale_orders_line".
 *
 * @property integer $order_line_id
 * @property integer $sale_orders_id
 * @property integer $sale_quote_line_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $payment_status
 * @property integer $payment_method
 * @property string $uuid
 *
 * @property \frontend\modules\billing\models\User $createdBy
 * @property \frontend\modules\billing\models\BlSaleOrders $saleOrders
 * @property \frontend\modules\billing\models\BlSaleQuoteLine $saleQuoteLine
 * @property \frontend\modules\billing\models\User $updatedBy
 * @property \frontend\modules\billing\models\DrugOrderLine $drugOrderLine
 * @property \frontend\modules\billing\models\LbTestAllocation[] $lbTestAllocations
 * @property \frontend\modules\billing\models\Obs[] $obs
 * @property \frontend\modules\billing\models\PhItemPrescriptionOrder[] $phItemPrescriptionOrders
 * @property \frontend\modules\billing\models\TestOrder $testOrder
 */
class BlSaleOrdersLine extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'createdBy',
            'saleOrders',
            'saleQuoteLine',
            'updatedBy',
            'drugOrderLine',
            'lbTestAllocations',
            'obs',
            'phItemPrescriptionOrders',
            'testOrder'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_orders_id', 'sale_quote_line_id', 'created_by', 'updated_by', 'payment_status', 'payment_method'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'required'],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bl_sale_orders_line';
    }
 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_line_id' => Yii::t('app', 'Order Line ID'),
            'sale_orders_id' => Yii::t('app', 'Sale Orders ID'),
            'sale_quote_line_id' => Yii::t('app', 'Sale Quote Line ID'),
            'payment_status' => Yii::t('app', 'Payment Status'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
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
    public function getSaleOrders()
    {
        return $this->hasOne(BlSaleOrders::className(), ['order_id' => 'sale_orders_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleQuoteLine()
    {
        return $this->hasOne(BlSaleQuoteLine::className(), ['quote_line_id' => 'sale_quote_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugOrderLine()
    {
       // return $this->hasOne(\frontend\modules\billing\models\DrugOrderLine::className(), ['order_id' => 'order_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLbTestAllocations()
    {
       // return $this->hasMany(\frontend\modules\billing\models\LbTestAllocation::className(), ['order_id' => 'order_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObs()
    {
       // return $this->hasMany(\frontend\modules\billing\models\Obs::className(), ['order_id' => 'order_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhItemPrescriptionOrders()
    {
       // return $this->hasMany(\frontend\modules\billing\models\PhItemPrescriptionOrder::className(), ['order_id' => 'order_line_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestOrder()
    {
        //return $this->hasOne(\frontend\modules\billing\models\TestOrder::className(), ['order_id' => 'order_line_id']);
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
