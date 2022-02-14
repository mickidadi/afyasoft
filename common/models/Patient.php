<?php

namespace common\models;

use Yii;
use common\models\Visit;
use common\components\UUIDBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "patient".
 *
 * @property int $patient_id
 * @property int|null $created_by
 * @property string|null $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 * @property int|null $voided
 * @property int|null $voided_by
 * @property string|null $date_voided
 * @property string|null $void_reason
 * @property string $allergy_status
 *
 * @property Allergy[] $allergies
 * @property AuditLog[] $auditLogs
 * @property BedPatientAssignmentMap[] $bedPatientAssignmentMaps
 * @property Conditions[] $conditions
 * @property Note[] $notes
 * @property OrderGroup[] $orderGroups
 * @property Orders[] $orders
 * @property Person $patient
 * @property User $updatedBy
 * @property User $createdBy
 * @property User $voidedBy
 * @property PatientAppointment[] $patientAppointments
 * @property PatientIdentifier[] $patientIdentifiers
 * @property PatientProgram[] $patientPrograms
 * @property SurgicalAppointment[] $surgicalAppointments
 * @property Visit[] $visits
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $phone_number;
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id'], 'required'],
            [['patient_id', 'created_by', 'updated_by', 'voided', 'voided_by'], 'integer'],
            [['created_at', 'updated_at', 'date_voided','middleName','firstName','lastName','phone_number','gender'], 'safe'],
            [['void_reason'], 'string', 'max' => 255],
            [['allergy_status'], 'string', 'max' => 50],
            [['patient_id'], 'unique'],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => PersonName::className(), 'targetAttribute' => ['patient_id' => 'person_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['voided_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['voided_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => Yii::t('app', 'Patient ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
            'allergy_status' => Yii::t('app', 'Allergy Status'),
        ];
    }

    /**
     * Gets query for [[Allergies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAllergies()
    {
        return $this->hasMany(Allergy::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[AuditLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditLogs()
    {
        return $this->hasMany(AuditLog::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[BedPatientAssignmentMaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBedPatientAssignmentMaps()
    {
        return $this->hasMany(BedPatientAssignmentMap::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Conditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConditions()
    {
        return $this->hasMany(Conditions::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Notes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[OrderGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGroups()
    {
        return $this->hasMany(OrderGroup::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(PersonName::className(), ['person_id' => 'patient_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[VoidedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoidedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'voided_by']);
    }

    /**
     * Gets query for [[PatientAppointments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientAppointments()
    {
        return $this->hasMany(PatientAppointment::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[PatientIdentifiers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientIdentifiers()
    {
        return $this->hasMany(PatientIdentifier::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[PatientPrograms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPrograms()
    {
        return $this->hasMany(PatientProgram::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[SurgicalAppointments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSurgicalAppointments()
    {
        return $this->hasMany(SurgicalAppointment::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Visits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['patient_id' => 'patient_id']);
    }
    public static function getDoctorRoom($patient_id,$visit_id){
          $room="";
         $model=PatientDoctorRoom::find()->where(["patient_id"=>$patient_id,'visit_id'=>$visit_id])->one();
            if($model){
            $room=$model->location_id>0?$model->location->name:"";
            }
            return $room;
    }
    public static function getDoctorRoomActive($patient_id){
        $room="";
       $model=PatientDoctorRoom::find()->where(["patient_id"=>$patient_id,'status'=>1])->one();
          if($model){
          $room=$model->location_id>0?$model->location->name:"";
          }
          return $room;
  }
    public static function getPatientName($patient_id){
        $name="";
        $rows=Patient::find()->where(["patient_id"=>$patient_id])->one();
             if($rows){
                $gender=$rows->patient->gender;
       $name=$rows->patient->given_name." ".$rows->patient->middle_name." ".$rows->patient->family_name." ; Gender :".$gender;
              
             }
             return $name;
    }
    public static function getRoomStatus(){
    //SELECT LN.name AS NAME, COUNT(*) AS count_patients FROM `patient_doctor_room` pdr JOIN location LN ON pdr.location_id = LN.location_id WHERE `created_at`>= CAST(NOW() - INTERVAL 1 DAY AS DATE) AND created_at <= CAST(NOW()+INTERVAL 1 DAY AS DATE) group by pdr.`location_id
     $model=Yii::$app->db->createCommand("SELECT LN.name AS name, COUNT(*) AS count_patients FROM location LN JOIN `patient_doctor_room` pdr ON pdr.location_id = LN.location_id WHERE parent_location=133 AND pdr.`created_at`>= CAST(NOW() - INTERVAL 1 DAY AS DATE) AND pdr.created_at <= CAST(NOW()+INTERVAL 1 DAY AS DATE) group by pdr.location_id")->queryAll();
    return $model;
    }
    public static function getPatientIdByUuid($patient_uuid){
        $patient_id=-99;
        $rows=PersonName::find()->where(["uuid"=>$patient_uuid])->one();
             if($rows){
           $patient_id=$rows->person_id;
             }
             return $patient_id;
    }
    public static function getPatientVisitByPatientId($patient_id){
        $visit_id=-99;
        $rows=Visit::find()->where(["patient_id"=>$patient_id])->orderBy("visit_id DESC")->one();
             if($rows){
           $visit_id=$rows->visit_id;
             }
      return $visit_id;
    }
    public static function getPatientUuidByPatientId($patient_id){
        $patient_uuid=-99;
        $rows=PersonName::find()->where(["person_id"=>$patient_id])->one();
             if($rows){
           $patient_uuid=$rows->uuid;
             }
             return $patient_uuid;
    }
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
          
        ];
    }
}
