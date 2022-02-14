<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "concept_class".
 *
 * @property integer $concept_class_id
 * @property string $name
 * @property string $description
 * @property integer $created_by
 * @property string $created_at
 * @property integer $retired
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property string $uuid
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property \common\models\Concept[] $concepts
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property \common\models\User $retiredBy
 * @property \common\models\OrderTypeClassMap $orderTypeClassMap
 * @property \common\models\OrderType[] $orderTypes
 */
class ConceptClass extends \yii\db\ActiveRecord
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
            'concepts',
            'updatedBy',
            'createdBy',
            'retiredBy',
            'orderTypeClassMap',
            'orderTypes'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by', 'retired_by', 'updated_by'], 'integer'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'date_retired', 'updated_at'], 'safe'],
            [['name', 'description', 'retire_reason'], 'string', 'max' => 255],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concept_class';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'concept_class_id' => Yii::t('app', 'Concept Class ID'),
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
    public function getConcepts()
    {
        return $this->hasMany(\common\models\Concept::className(), ['class_id' => 'concept_class_id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getOrderTypeClassMap()
    {
        return $this->hasOne(\common\models\OrderTypeClassMap::className(), ['concept_class_id' => 'concept_class_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderTypes()
    {
        return $this->hasMany(\common\models\OrderType::className(), ['order_type_id' => 'order_type_id'])->viaTable('order_type_class_map', ['concept_class_id' => 'concept_class_id']);
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
                'column' => 'id',
            ],
        ];
    }
}
