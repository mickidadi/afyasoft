<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "visit_attribute".
 *
 * @property integer $visit_attribute_id
 * @property integer $visit_id
 * @property integer $payment_category_concept_id
 * @property integer $insurance_concept_id
 * @property string $insurance_number
 * @property integer $track_scheme_concept_id
 * @property integer $attribute_type_id
 * @property string $value_reference
 * @property string $uuid
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $voided
 * @property integer $voided_by
 * @property string $date_voided
 * @property string $void_reason
 *
 * @property \common\models\VisitAttributeType $attributeType
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property \common\models\Visit $visit
 * @property \common\models\User $voidedBy
 */
class VisitAttribute extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'attributeType',
            'updatedBy',
            'createdBy',
            'visit',
            'voidedBy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id', 'attribute_type_id'], 'required'],
            [['visit_id', 'payment_category_concept_id', 'insurance_concept_id', 'track_scheme_concept_id', 'attribute_type_id', 'created_by', 'updated_by', 'voided_by'], 'integer'],
            [['value_reference'], 'string'],
            [['created_at', 'updated_at', 'date_voided','location_id'], 'safe'],
            [['insurance_number'], 'string', 'max' => 30],
            [['uuid'], 'string', 'max' => 38],
            [['voided'], 'string', 'max' => 1],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'unique'],
             
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit_attribute';
    }

 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_attribute_id' => Yii::t('app', 'Visit Attribute ID'),
            'visit_id' => Yii::t('app', 'Visit ID'),
            'payment_category_concept_id' => Yii::t('app', 'Payment Category Concept'),
            'insurance_concept_id' => Yii::t('app', 'Insurance Concept'),
            'insurance_number' => Yii::t('app', 'Insurance Number'),
            'track_scheme_concept_id' => Yii::t('app', 'Track Scheme Concept'),
            'attribute_type_id' => Yii::t('app', 'Attribute Type ID'),
            'value_reference' => Yii::t('app', 'Value Reference'),
            'uuid' => Yii::t('app', 'Uuid'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeType()
    {
        return $this->hasOne(\common\models\VisitAttributeType::className(), ['visit_attribute_type_id' => 'attribute_type_id']);
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
    public function getVisit()
    {
        return $this->hasOne(\common\models\Visit::className(), ['visit_id' => 'visit_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoidedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'voided_by']);
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
