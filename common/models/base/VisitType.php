<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "visit_type".
 *
 * @property integer $visit_type_id
 * @property string $name
 * @property string $description
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $retired
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property string $uuid
 *
 * @property \common\models\PhVisitPaymentDispenseMap[] $phVisitPaymentDispenseMaps
 * @property \common\models\Visit[] $visits
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property \common\models\User $retiredBy
 */
class VisitType extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

  

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'phVisitPaymentDispenseMaps',
            'visits',
            'updatedBy',
            'createdBy',
            'retiredBy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by', 'updated_by', 'retired_by'], 'integer'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['name', 'retire_reason'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1024],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit_type';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_type_id' => Yii::t('app', 'Visit Type ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'retired' => Yii::t('app', 'Retired'),
            'retired_by' => Yii::t('app', 'Retired By'),
            'date_retired' => Yii::t('app', 'Date Retired'),
            'retire_reason' => Yii::t('app', 'Retire Reason'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhVisitPaymentDispenseMaps()
    {
        return $this->hasMany(\common\models\PhVisitPaymentDispenseMap::className(), ['visit_type_id' => 'visit_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(\common\models\Visit::className(), ['visit_type_id' => 'visit_type_id']);
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
    public function getRetiredBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'retired_by']);
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
