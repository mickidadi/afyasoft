<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "concept_numeric".
 *
 * @property integer $concept_id
 * @property double $hi_absolute
 * @property double $hi_critical
 * @property double $hi_normal
 * @property double $low_absolute
 * @property double $low_critical
 * @property double $low_normal
 * @property string $units
 * @property integer $precise
 * @property integer $display_precision
 *
 * @property \common\models\Concept $concept
 */
class ConceptNumeric extends \yii\db\ActiveRecord
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
            'concept'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concept_id'], 'required'],
            [['concept_id', 'display_precision'], 'integer'],
            [['hi_absolute', 'hi_critical', 'hi_normal', 'low_absolute', 'low_critical', 'low_normal'], 'number'],
            [['units'], 'string', 'max' => 50],
            [['precise'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concept_numeric';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'concept_id' => Yii::t('app', 'Concept ID'),
            'hi_absolute' => Yii::t('app', 'Hi Absolute'),
            'hi_critical' => Yii::t('app', 'Hi Critical'),
            'hi_normal' => Yii::t('app', 'Hi Normal'),
            'low_absolute' => Yii::t('app', 'Low Absolute'),
            'low_critical' => Yii::t('app', 'Low Critical'),
            'low_normal' => Yii::t('app', 'Low Normal'),
            'units' => Yii::t('app', 'Units'),
            'precise' => Yii::t('app', 'Precise'),
            'display_precision' => Yii::t('app', 'Display Precision'),
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
