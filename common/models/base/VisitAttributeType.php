<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "visit_attribute_type".
 *
 * @property integer $visit_attribute_type_id
 * @property string $name
 * @property string $description
 * @property string $datatype
 * @property string $datatype_config
 * @property string $preferred_handler
 * @property string $handler_config
 * @property integer $min_occurs
 * @property integer $max_occurs
 * @property integer $creator
 * @property string $date_created
 * @property integer $changed_by
 * @property string $date_changed
 * @property integer $retired
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property string $uuid
 *
 * @property \common\models\VisitAttribute[] $visitAttributes
 * @property \common\models\User $changedBy
 * @property \common\models\User $creator0
 * @property \common\models\User $retiredBy
 */
class VisitAttributeType extends \yii\db\ActiveRecord
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
            'visitAttributes',
            'changedBy',
            'creator0',
            'retiredBy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'min_occurs', 'creator', 'date_created', 'uuid'], 'required'],
            [['datatype_config', 'handler_config'], 'string'],
            [['min_occurs', 'max_occurs', 'creator', 'changed_by', 'retired_by'], 'integer'],
            [['date_created', 'date_changed', 'date_retired'], 'safe'],
            [['name', 'datatype', 'preferred_handler', 'retire_reason'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1024],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
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
        return 'visit_attribute_type';
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
            'visit_attribute_type_id' => Yii::t('app', 'Visit Attribute Type ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'datatype' => Yii::t('app', 'Datatype'),
            'datatype_config' => Yii::t('app', 'Datatype Config'),
            'preferred_handler' => Yii::t('app', 'Preferred Handler'),
            'handler_config' => Yii::t('app', 'Handler Config'),
            'min_occurs' => Yii::t('app', 'Min Occurs'),
            'max_occurs' => Yii::t('app', 'Max Occurs'),
            'creator' => Yii::t('app', 'Creator'),
            'date_created' => Yii::t('app', 'Date Created'),
            'changed_by' => Yii::t('app', 'Changed By'),
            'date_changed' => Yii::t('app', 'Date Changed'),
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
    public function getVisitAttributes()
    {
        return $this->hasMany(\common\models\VisitAttribute::className(), ['attribute_type_id' => 'visit_attribute_type_id']);
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
