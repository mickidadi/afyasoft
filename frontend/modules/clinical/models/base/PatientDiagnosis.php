<?php

namespace frontend\modules\clinical\models\base;

use Yii;
use common\models\User;
use common\models\Visit;
use common\models\Concept;
use common\models\Patient;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "patient_diagnosis".
 *
 * @property integer $patient_diagnosis_id
 * @property integer $patient_id
 * @property integer $visit_id
 * @property integer $concept_id
 * @property integer $orders
 * @property integer $certainty
 * @property string $comment
 * @property string $condition_date
 * @property integer $status
 * @property string $uuid
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property \frontend\modules\clinical\models\Patient $patient
 * @property \frontend\modules\clinical\models\Concept $concept
 * @property \frontend\modules\clinical\models\User $createdBy
 * @property \frontend\modules\clinical\models\User $updatedBy
 * @property \frontend\modules\clinical\models\Visit $visit
 */
class PatientDiagnosis extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'patient',
            'concept',
            'createdBy',
            'updatedBy',
            'visit'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concept_id','orders', 'certainty', 'status'], 'required'],
            [['patient_id', 'visit_id', 'concept_id', 'orders', 'certainty', 'status', 'created_by', 'updated_by','diagnosis_type'], 'integer'],
            [['comment'], 'string'],
            [['condition_date', 'created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 100],
            [['uuid'], 'unique'],
             
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_diagnosis';
    }
 

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_diagnosis_id' => Yii::t('app', 'Patient Diagnosis ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'visit_id' => Yii::t('app', 'Visit ID'),
            'concept_id' => Yii::t('app', 'Diagnosis'),
            'orders' => Yii::t('app', 'Orders'),
            'certainty' => Yii::t('app', 'Certainty'),
            'comment' => Yii::t('app', 'Comment'),
            'condition_date' => Yii::t('app', 'Condition Date'),
            'status' => Yii::t('app', 'Status'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['patient_id' => 'patient_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcept()
    {
        return $this->hasOne(Concept::className(), ['concept_id' => 'concept_id']);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisit()
    {
        return $this->hasOne(Visit::className(), ['visit_id' => 'visit_id']);
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
