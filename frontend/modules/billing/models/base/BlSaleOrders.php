<?php

namespace frontend\modules\billing\models\base;

use Yii;
use common\models\User;
use common\models\Visit;
use common\models\Patient;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;
use frontend\modules\billing\models\BlSaleOrdersLine;

/**
 * This is the base model class for table "bl_sale_orders".
 *
 * @property integer $order_id
 * @property integer $patient_id
 * @property integer $visit_id
 * @property double $total_quote
 * @property double $payable_amount
 * @property integer $status
 * @property integer $discounted
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $uuid
 *
 * @property \frontend\modules\billing\models\Patient $patient
 * @property \frontend\modules\billing\models\Visit $visit
 * @property \frontend\modules\billing\models\User $createdBy
 * @property \frontend\modules\billing\models\User $updatedBy
 * @property \frontend\modules\billing\models\BlSaleOrdersLine[] $blSaleOrdersLines
 */
class BlSaleOrders extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'patient',
            'visit',
            'createdBy',
            'updatedBy',
            'blSaleOrdersLines'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id'], 'required'],
            [['patient_id', 'visit_id', 'status', 'discounted', 'created_by', 'updated_by'], 'integer'],
            [['total_quote', 'payable_amount'], 'number'],
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
        return 'bl_sale_orders';
    }

    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => Yii::t('app', 'Order ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'visit_id' => Yii::t('app', 'Visit ID'),
            'total_quote' => Yii::t('app', 'Total Quote'),
            'payable_amount' => Yii::t('app', 'Payable Amount'),
            'status' => Yii::t('app', 'Status'),
            'discounted' => Yii::t('app', 'Discounted'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['patient_id' => 'patient_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisit()
    {
        return $this->hasOne(Visit::className(), ['visit_id' => 'visit_id']);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlSaleOrdersLines()
    {
        return $this->hasMany(BlSaleOrdersLine::className(), ['sale_orders_id' => 'order_id']);
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
