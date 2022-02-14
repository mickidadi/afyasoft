<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "concept_set".
 *
 * @property integer $concept_set_id
 * @property integer $concept_id
 * @property integer $concept_set
 * @property double $sort_weight
 * @property integer $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $uuid
 *
 * @property \common\models\Concept $concept
 * @property \common\models\Concept $conceptSet
 * @property \common\models\User $createdBy
 */
class ConceptSet extends \yii\db\ActiveRecord
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
            'concept',
            'conceptSet',
            'createdBy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concept_id', 'concept_set', 'created_by', 'updated_by'], 'integer'],
            [['sort_weight'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'required'],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concept_set';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'concept_set_id' => Yii::t('app', 'Concept Set ID'),
            'concept_id' => Yii::t('app', 'Concept ID'),
            'concept_set' => Yii::t('app', 'Concept Set'),
            'sort_weight' => Yii::t('app', 'Sort Weight'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcept()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptSet()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'concept_set']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
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
