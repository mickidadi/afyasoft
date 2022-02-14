<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bl_service_type".
 *
 * @property integer $service_type_id
 * @property string $name
 * @property integer $creator
 * @property string $date_created
 * @property integer $changed_by
 * @property string $date_changed
 * @property integer $retired
 * @property string $uuid
 *
 * @property \common\models\BlItemPrice[] $blItemPrices
 * @property \common\models\BlSaleQuoteLine[] $blSaleQuoteLines
 * @property \common\models\User $changedBy
 * @property \common\models\User $creator0
 */
class BlServiceType extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'blItemPrices',
            'blSaleQuoteLines',
            'changedBy',
            'creator0'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'creator', 'date_created', 'uuid'], 'required'],
            [['creator', 'changed_by', 'retired'], 'integer'],
            [['date_created', 'date_changed'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 58],
            [['name'], 'unique'],
            [['uuid'], 'unique'],
            [['uuid'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bl_service_type';
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
            'service_type_id' => Yii::t('app', 'Service Type ID'),
            'name' => Yii::t('app', 'Name'),
            'creator' => Yii::t('app', 'Creator'),
            'date_created' => Yii::t('app', 'Date Created'),
            'changed_by' => Yii::t('app', 'Changed By'),
            'date_changed' => Yii::t('app', 'Date Changed'),
            'retired' => Yii::t('app', 'Retired'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlItemPrices()
    {
        return $this->hasMany(\common\models\BlItemPrice::className(), ['service_type' => 'service_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlSaleQuoteLines()
    {
        return $this->hasMany(\common\models\BlSaleQuoteLine::className(), ['service_type' => 'service_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'changed_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'creator']);
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
