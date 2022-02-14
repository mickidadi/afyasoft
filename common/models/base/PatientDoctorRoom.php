<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "patient_doctor_room".
 *
 * @property integer $patient_doctor_room_id
 * @property integer $patient_id
 * @property integer $location_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $voided
 * @property integer $voided_by
 * @property string $date_voided
 * @property string $void_reason
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $visit_id
 * @property string $uuid
 * @property integer $status
 *
 * @property \common\models\Patient $patient
 * @property \common\models\Location $location
 * @property \common\models\User $createdBy
 * @property \common\models\Visit $updatedBy
 * @property \common\models\Visit $visit
 */
class PatientDoctorRoom extends \yii\db\ActiveRecord
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
            'location',
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
            [['patient_id', 'created_at', 'uuid'], 'required'],
            [['patient_id', 'location_id', 'created_by', 'voided_by', 'updated_by', 'visit_id', 'status'], 'integer'],
            [['created_at', 'date_voided', 'updated_at'], 'safe'],
            [['voided'], 'string', 'max' => 1],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_doctor_room';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_doctor_room_id' => Yii::t('app', 'Patient Doctor Room ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'location_id' => Yii::t('app', 'Location ID'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
            'visit_id' => Yii::t('app', 'Visit ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(\common\models\Patient::className(), ['patient_id' => 'patient_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(\common\models\Location::className(), ['location_id' => 'location_id']);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\Visit::className(), ['visit_id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisit()
    {
        return $this->hasOne(\common\models\Visit::className(), ['visit_id' => 'visit_id']);
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
