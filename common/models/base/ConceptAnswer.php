<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "concept_answer".
 *
 * @property integer $concept_answer_id
 * @property integer $concept_id
 * @property integer $answer_concept
 * @property integer $answer_drug
 * @property integer $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 * @property double $sort_weight
 * @property string $uuid
 *
 * @property \common\models\Concept $answerConcept
 * @property \common\models\Drug $answerDrug
 * @property \common\models\User $createdBy
 * @property \common\models\Concept $concept
 */
class ConceptAnswer extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'answerConcept',
            'answerDrug',
            'createdBy',
            'concept'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concept_id', 'answer_drug', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['sort_weight'], 'number'],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concept_answer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'concept_id' => Yii::t('app', 'Concept ID'),
            'answer_concept' => Yii::t('app', 'Answer Concept'),
            'answer_drug' => Yii::t('app', 'Answer Drug'),
            'sort_weight' => Yii::t('app', 'Sort Weight'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerConcept()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'answer_concept']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerDrug()
    {
        return $this->hasOne(\common\models\Drug::className(), ['drug_id' => 'answer_drug']);
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
    public function getConcept()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'concept_id']);
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
