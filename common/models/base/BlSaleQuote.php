<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bl_sale_quote".
 *
 * @property integer $quote_id
 * @property integer $patient
 * @property integer $visit
 * @property integer $created_by
 * @property double $total_quote
 * @property double $payable_amount
 * @property integer $status
 * @property integer $discounted
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property string $uuid
 *
 * @property \common\models\BlSaleOrderByQuote[] $blSaleOrderByQuotes
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property \common\models\Patient $patient0
 * @property \common\models\BlQuoteStatusCode $status0
 * @property \common\models\Visit $visit0
 * @property \common\models\BlSaleQuoteLine[] $blSaleQuoteLines
 */
class BlSaleQuote extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

  

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'blSaleOrderByQuotes',
            'updatedBy',
            'createdBy',
            'patient0',
            'status0',
            'visit0',
            'blSaleQuoteLines'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient', 'visit'], 'required'],
            [['patient', 'visit', 'created_by', 'status', 'discounted', 'updated_by'], 'integer'],
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
        return 'bl_sale_quote';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quote_id' => Yii::t('app', 'Quote ID'),
            'patient' => Yii::t('app', 'Patient'),
            'visit' => Yii::t('app', 'Visit'),
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
    public function getBlSaleOrderByQuotes()
    {
        return $this->hasMany(\common\models\BlSaleOrderByQuote::className(), ['sale_quote' => 'quote_id']);
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
    public function getPatient0()
    {
        return $this->hasOne(\common\models\Patient::className(), ['patient_id' => 'patient']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(\common\models\BlQuoteStatusCode::className(), ['status_code_id' => 'status']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisit0()
    {
        return $this->hasOne(\common\models\Visit::className(), ['visit_id' => 'visit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlSaleQuoteLines()
    {
        return $this->hasMany(\common\models\BlSaleQuoteLine::className(), ['sale_quote' => 'quote_id']);
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
