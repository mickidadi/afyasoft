<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bed_location_map".
 *
 * @property integer $bed_location_map_id
 * @property integer $location_id
 * @property integer $row_number
 * @property integer $column_number
 * @property integer $bed_id
 *
 * @property \common\models\Bed $bed
 * @property \common\models\Location $location
 */
class BedLocationMap extends \yii\db\ActiveRecord
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
            'bed',
            'location'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'row_number', 'column_number'], 'required'],
            [['location_id', 'row_number', 'column_number', 'bed_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bed_location_map';
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
            'bed_location_map_id' => Yii::t('app', 'Bed Location Map ID'),
            'location_id' => Yii::t('app', 'Location ID'),
            'row_number' => Yii::t('app', 'Row Number'),
            'column_number' => Yii::t('app', 'Column Number'),
            'bed_id' => Yii::t('app', 'Bed ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBed()
    {
        return $this->hasOne(\common\models\Bed::className(), ['bed_id' => 'bed_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(\common\models\Location::className(), ['location_id' => 'location_id']);
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
