<?php

namespace frontend\modules\billing\models\base;

use Yii;
use common\models\User;
use common\models\BlItemPrice;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;
use frontend\modules\billing\models\BlFinancialPeriod;

/**
 * This is the base model class for table "bl_price_list_version".
 *
 * @property integer $id
 * @property integer $financial_period_id
 * @property string $version_name
 * @property integer $status
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property string $uuid
 *
 * @property \frontend\modules\billing\models\BlItemPrice[] $blItemPrices
 * @property \frontend\modules\billing\models\User $updatedBy
 * @property \frontend\modules\billing\models\User $createdBy
 * @property \frontend\modules\billing\models\BlFinancialPeriod $financialPeriod
 */
class BlPriceListVersion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'blItemPrices',
            'updatedBy',
            'createdBy',
            'financialPeriod'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['financial_period_id', 'version_name', 'status', 'created_by', 'created_at', 'uuid'], 'required'],
            [['financial_period_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['version_name'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bl_price_list_version';
    }

   

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'financial_period_id' => Yii::t('app', 'Financial Period ID'),
            'version_name' => Yii::t('app', 'Version Name'),
            'status' => Yii::t('app', 'Status'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlItemPrices()
    {
        return $this->hasMany(BlItemPrice::className(), ['price_list_version' => 'id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinancialPeriod()
    {
        return $this->hasOne(BlFinancialPeriod::className(), ['period_id' => 'financial_period_id']);
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
