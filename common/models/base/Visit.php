<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "visit".
 *
 * @property integer $visit_id
 * @property integer $patient_id
 * @property integer $visit_type_id
 * @property string $date_started
 * @property string $date_stopped
 * @property integer $indication_concept_id
 * @property integer $location_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $voided
 * @property integer $voided_by
 * @property string $date_voided
 * @property string $void_reason
 * @property string $uuid
 *
 * @property \common\models\AppointmentschedulingAppointment[] $appointmentschedulingAppointments
 * @property \common\models\BlSaleQuote[] $blSaleQuotes
 * @property \common\models\Encounter[] $encounters
 * @property \common\models\PhItemPrescriptionOrder[] $phItemPrescriptionOrders
 * @property \common\models\User $updatedBy
 * @property \common\models\User $createdBy
 * @property \common\models\Concept $indicationConcept
 * @property \common\models\Location $location
 * @property \common\models\Patient $patient
 * @property \common\models\VisitType $visitType
 * @property \common\models\User $voidedBy
 * @property \common\models\VisitAttribute[] $visitAttributes
 */
class Visit extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'appointmentschedulingAppointments',
            'blSaleQuotes',
            'encounters',
            'phItemPrescriptionOrders',
            'updatedBy',
            'createdBy',
            'indicationConcept',
            'location',
            'patient',
            'visitType',
            'voidedBy',
            'visitAttributes'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'visit_type_id'], 'required'],
            [['patient_id', 'visit_type_id', 'indication_concept_id', 'location_id', 'created_by', 'updated_by', 'voided_by'], 'integer'],
            [['date_started', 'date_stopped', 'created_at', 'updated_at', 'date_voided'], 'safe'],
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
        return 'visit';
    }

  
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => Yii::t('app', 'Visit ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'visit_type_id' => Yii::t('app', 'Visit Type ID'),
            'date_started' => Yii::t('app', 'Date Started'),
            'date_stopped' => Yii::t('app', 'Date Stopped'),
            'indication_concept_id' => Yii::t('app', 'Indication Concept ID'),
            'location_id' => Yii::t('app', 'Location ID'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentschedulingAppointments()
    {
        return $this->hasMany(\common\models\AppointmentschedulingAppointment::className(), ['visit_id' => 'visit_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlSaleQuotes()
    {
        return $this->hasMany(\common\models\BlSaleQuote::className(), ['visit' => 'visit_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncounters()
    {
        return $this->hasMany(\common\models\Encounter::className(), ['visit_id' => 'visit_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhItemPrescriptionOrders()
    {
        return $this->hasMany(\common\models\PhItemPrescriptionOrder::className(), ['visit_id' => 'visit_id']);
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
    public function getIndicationConcept()
    {
        return $this->hasOne(\common\models\Concept::className(), ['concept_id' => 'indication_concept_id']);
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
    public function getPatient()
    {
        return $this->hasOne(\common\models\Patient::className(), ['patient_id' => 'patient_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitType()
    {
        return $this->hasOne(\common\models\VisitType::className(), ['visit_type_id' => 'visit_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoidedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'voided_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitAttributes()
    {
        return $this->hasMany(\common\models\VisitAttribute::className(), ['visit_id' => 'visit_id']);
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
