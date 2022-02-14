<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "concept_datatype".
 *
 * @property integer $concept_datatype_id
 * @property string $name
 * @property string $hl7_abbreviation
 * @property string $description
 * @property integer $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $retired
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property string $uuid
 *
 * @property \common\models\Concept[] $concepts
 * @property \common\models\User $createdBy
 * @property \common\models\User $retiredBy
 */
class ConceptDatatype extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'concepts',
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
            [['created_by', 'updated_by', 'retired_by'], 'integer'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['uuid'], 'required'],
            [['name', 'description', 'retire_reason'], 'string', 'max' => 255],
            [['hl7_abbreviation'], 'string', 'max' => 3],
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
        return 'concept_datatype';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Concept Datatype ID',
            'name' => 'Name',
            'hl7_abbreviation' => 'Hl7 Abbreviation',
            'description' => 'Description',
            'retired' => 'Retired',
            'retired_by' => 'Retired By',
            'date_retired' => 'Date Retired',
            'retire_reason' => 'Retire Reason',
            'uuid' => 'Uuid',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcepts()
    {
        return $this->hasMany(\common\models\Concept::className(), ['datatype_id' => 'id']);
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
                'column' => 'id',
            ],
        ];
    }
}
