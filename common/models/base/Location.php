<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "location".
 *
 * @property integer $location_id
 * @property string $name
 * @property string $description
 * @property string $address1
 * @property string $address2
 * @property string $city_village
 * @property string $state_province
 * @property string $postal_code
 * @property string $country
 * @property string $latitude
 * @property string $longitude
 * @property integer $creator
 * @property string $date_created
 * @property string $county_district
 * @property string $address3
 * @property string $address4
 * @property string $address5
 * @property string $address6
 * @property integer $retired
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property integer $parent_location
 * @property string $uuid
 * @property integer $changed_by
 * @property string $date_changed
 * @property string $address7
 * @property string $address8
 * @property string $address9
 * @property string $address10
 * @property string $address11
 * @property string $address12
 * @property string $address13
 * @property string $address14
 * @property string $address15
 *
 * @property \common\models\AppointmentService[] $appointmentServices
 * @property \common\models\BedLocationMap[] $bedLocationMaps
 * @property \common\models\User $changedBy
 * @property \common\models\Location $parentLocation
 * @property \common\models\Location[] $locations
 * @property \common\models\User $creator0
 * @property \common\models\User $retiredBy
 * @property \common\models\LocationTagMap[] $locationTagMaps
 * @property \common\models\LocationTag[] $locationTags
 * @property \common\models\Obs[] $obs
 * @property \common\models\PatientAppointment[] $patientAppointments
 * @property \common\models\PatientIdentifier[] $patientIdentifiers
 * @property \common\models\PatientProgram[] $patientPrograms
 * @property \common\models\SurgicalBlock[] $surgicalBlocks
 * @property \common\models\Visit[] $visits
 */
class Location extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
 

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'appointmentServices',
            'bedLocationMaps',
            'changedBy',
            'parentLocation',
            'locations',
            'creator0',
            'retiredBy',
            'locationTagMaps',
            'locationTags',
            'obs',
            'patientAppointments',
            'patientIdentifiers',
            'patientPrograms',
            'surgicalBlocks',
            'visits'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creator', 'retired_by', 'parent_location', 'changed_by'], 'integer'],
            [['date_created', 'uuid'], 'required'],
            [['date_created', 'date_retired', 'date_changed'], 'safe'],
            [['name', 'description', 'address1', 'address2', 'city_village', 'state_province', 'county_district', 'address3', 'address4', 'address5', 'address6', 'retire_reason', 'address7', 'address8', 'address9', 'address10', 'address11', 'address12', 'address13', 'address14', 'address15'], 'string', 'max' => 255],
            [['postal_code', 'country', 'latitude', 'longitude'], 'string', 'max' => 50],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
          
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

   

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => Yii::t('app', 'Location ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'address1' => Yii::t('app', 'Address1'),
            'address2' => Yii::t('app', 'Address2'),
            'city_village' => Yii::t('app', 'City Village'),
            'state_province' => Yii::t('app', 'State Province'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'country' => Yii::t('app', 'Country'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'creator' => Yii::t('app', 'Creator'),
            'date_created' => Yii::t('app', 'Date Created'),
            'county_district' => Yii::t('app', 'County District'),
            'address3' => Yii::t('app', 'Address3'),
            'address4' => Yii::t('app', 'Address4'),
            'address5' => Yii::t('app', 'Address5'),
            'address6' => Yii::t('app', 'Address6'),
            'retired' => Yii::t('app', 'Retired'),
            'retired_by' => Yii::t('app', 'Retired By'),
            'date_retired' => Yii::t('app', 'Date Retired'),
            'retire_reason' => Yii::t('app', 'Retire Reason'),
            'parent_location' => Yii::t('app', 'Parent Location'),
            'uuid' => Yii::t('app', 'Uuid'),
            'changed_by' => Yii::t('app', 'Changed By'),
            'date_changed' => Yii::t('app', 'Date Changed'),
            'address7' => Yii::t('app', 'Address7'),
            'address8' => Yii::t('app', 'Address8'),
            'address9' => Yii::t('app', 'Address9'),
            'address10' => Yii::t('app', 'Address10'),
            'address11' => Yii::t('app', 'Address11'),
            'address12' => Yii::t('app', 'Address12'),
            'address13' => Yii::t('app', 'Address13'),
            'address14' => Yii::t('app', 'Address14'),
            'address15' => Yii::t('app', 'Address15'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentServices()
    {
        return $this->hasMany(\common\models\AppointmentService::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBedLocationMaps()
    {
        return $this->hasMany(\common\models\BedLocationMap::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'changed_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentLocation()
    {
        return $this->hasOne(\common\models\Location::className(), ['location_id' => 'parent_location']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(\common\models\Location::className(), ['parent_location' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'creator']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetiredBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'retired_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationTagMaps()
    {
        return $this->hasMany(\common\models\LocationTagMap::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationTags()
    {
        return $this->hasMany(\common\models\LocationTag::className(), ['location_tag_id' => 'location_tag_id'])->viaTable('location_tag_map', ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObs()
    {
        return $this->hasMany(\common\models\Obs::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientAppointments()
    {
        return $this->hasMany(\common\models\PatientAppointment::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientIdentifiers()
    {
        return $this->hasMany(\common\models\PatientIdentifier::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPrograms()
    {
        return $this->hasMany(\common\models\PatientProgram::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurgicalBlocks()
    {
        return $this->hasMany(\common\models\SurgicalBlock::className(), ['location_id' => 'location_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(\common\models\Visit::className(), ['location_id' => 'location_id']);
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
