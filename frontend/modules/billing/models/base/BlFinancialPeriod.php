<?php

namespace frontend\modules\billing\models\base;

use Yii;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bl_financial_period".
 *
 * @property integer $period_id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property string $uuid
 *
 * @property \frontend\modules\billing\models\User $updatedBy
 * @property \frontend\modules\billing\models\User $createdBy
 * @property \frontend\modules\billing\models\BlPriceListVersion[] $blPriceListVersions
 */
class BlFinancialPeriod extends \yii\db\ActiveRecord
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
            'blPriceListVersions'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'start_date', 'end_date','status'], 'required'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            [['name'], 'unique'],
             
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bl_financial_period';
    }

  

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'period_id' => Yii::t('app', 'Period ID'),
            'name' => Yii::t('app', 'Name'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'status' => Yii::t('app', 'Status'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
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
    public function getBlPriceListVersions()
    {
        return $this->hasMany(BlPriceListVersion::className(), ['financial_period_id' => 'period_id']);
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
