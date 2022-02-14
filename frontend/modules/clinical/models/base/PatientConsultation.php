<?php

namespace frontend\modules\clinical\models\base;

use Yii;
use common\models\User;
use common\models\Visit;
use common\models\Patient;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "patient_consultation".
 *
 * @property integer $patient_consultation_id
 * @property integer $visit_id
 * @property integer $patient_id
 * @property string $comment
 * @property string $uuid
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property \frontend\modules\clinical\models\Visit $visit
 * @property \frontend\modules\clinical\models\Patient $patient
 * @property \frontend\modules\clinical\models\User $createdBy
 * @property \frontend\modules\clinical\models\User $updatedBy
 */
class PatientConsultation extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

     

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'visit',
            'patient',
            'createdBy',
            'updatedBy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['visit_id', 'patient_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 100],
            [['uuid'], 'unique'],
             
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_consultation';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_consultation_id' => Yii::t('app', 'Patient Consultation ID'),
            'visit_id' => Yii::t('app', 'Visit ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'comment' => Yii::t('app', 'Consultation Note'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisit()
    {
        return $this->hasOne(Visit::className(), ['visit_id' => 'visit_id']);
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
