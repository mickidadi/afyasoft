<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "appointment_service".
 *
 * @property integer $appointment_service_id
 * @property string $name
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property integer $location_id
 * @property integer $speciality_id
 * @property integer $max_appointments_limit
 * @property integer $duration_mins
 * @property string $color
 * @property string $date_created
 * @property integer $creator
 * @property string $date_changed
 * @property integer $changed_by
 * @property integer $voided
 * @property integer $voided_by
 * @property string $date_voided
 * @property string $void_reason
 * @property string $uuid
 *
 * @property \common\models\Location $location
 * @property \common\models\AppointmentSpeciality $speciality
 * @property \common\models\AppointmentServiceType[] $appointmentServiceTypes
 * @property \common\models\AppointmentServiceWeeklyAvailability[] $appointmentServiceWeeklyAvailabilities
 * @property \common\models\PatientAppointment[] $patientAppointments
 */
class AppointmentService extends \yii\db\ActiveRecord
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
            'location',
            'speciality',
            'appointmentServiceTypes',
            'appointmentServiceWeeklyAvailabilities',
            'patientAppointments'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_created', 'creator', 'uuid'], 'required'],
            [['description'], 'string'],
            [['start_time', 'end_time', 'date_created', 'date_changed', 'date_voided'], 'safe'],
            [['location_id', 'speciality_id', 'max_appointments_limit', 'duration_mins', 'creator', 'changed_by', 'voided_by'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 8],
            [['voided'], 'string', 'max' => 4],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment_service';
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
            'appointment_service_id' => Yii::t('app', 'Appointment Service ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'location_id' => Yii::t('app', 'Location ID'),
            'speciality_id' => Yii::t('app', 'Speciality ID'),
            'max_appointments_limit' => Yii::t('app', 'Max Appointments Limit'),
            'duration_mins' => Yii::t('app', 'Duration Mins'),
            'color' => Yii::t('app', 'Color'),
            'date_created' => Yii::t('app', 'Date Created'),
            'creator' => Yii::t('app', 'Creator'),
            'date_changed' => Yii::t('app', 'Date Changed'),
            'changed_by' => Yii::t('app', 'Changed By'),
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
    public function getLocation()
    {
        return $this->hasOne(\common\models\Location::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(\common\models\AppointmentSpeciality::className(), ['speciality_id' => 'speciality_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentServiceTypes()
    {
        return $this->hasMany(\common\models\AppointmentServiceType::className(), ['appointment_service_id' => 'appointment_service_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentServiceWeeklyAvailabilities()
    {
        return $this->hasMany(\common\models\AppointmentServiceWeeklyAvailability::className(), ['service_id' => 'appointment_service_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientAppointments()
    {
        return $this->hasMany(\common\models\PatientAppointment::className(), ['appointment_service_id' => 'appointment_service_id']);
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
