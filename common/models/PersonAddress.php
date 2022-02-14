<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person_address".
 *
 * @property int $person_address_id
 * @property int|null $person_id
 * @property int $preferred
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city_village
 * @property string|null $state_province
 * @property string|null $postal_code
 * @property string|null $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $creator
 * @property string $date_created
 * @property int $voided
 * @property int|null $voided_by
 * @property string|null $date_voided
 * @property string|null $void_reason
 * @property string|null $county_district
 * @property string|null $address3
 * @property string|null $address4
 * @property string|null $address5
 * @property string|null $address6
 * @property string|null $date_changed
 * @property int|null $changed_by
 * @property string $uuid
 * @property string|null $address7
 * @property string|null $address8
 * @property string|null $address9
 * @property string|null $address10
 * @property string|null $address11
 * @property string|null $address12
 * @property string|null $address13
 * @property string|null $address14
 * @property string|null $address15
 *
 * @property Person $person
 * @property User $creator0
 * @property User $voidedBy
 * @property User $changedBy
 */
class PersonAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'preferred', 'creator', 'voided', 'voided_by', 'changed_by'], 'integer'],
            [['start_date', 'end_date', 'date_created', 'date_voided', 'date_changed'], 'safe'],
            [['date_created', 'uuid'], 'required'],
            [['address1', 'address2', 'city_village', 'state_province', 'void_reason', 'county_district', 'address3', 'address4', 'address5', 'address6', 'address7', 'address8', 'address9', 'address10', 'address11', 'address12', 'address13', 'address14', 'address15'], 'string', 'max' => 255],
            [['postal_code', 'country', 'latitude', 'longitude'], 'string', 'max' => 50],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator' => 'id']],
            [['voided_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['voided_by' => 'id']],
            [['changed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['changed_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_address_id' => Yii::t('app', 'Person Address ID'),
            'person_id' => Yii::t('app', 'Person ID'),
            'preferred' => Yii::t('app', 'Preferred'),
            'address1' => Yii::t('app', 'Address1'),
            'address2' => Yii::t('app', 'Address2'),
            'city_village' => Yii::t('app', 'City Village'),
            'state_province' => Yii::t('app', 'State Province'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'country' => Yii::t('app', 'Country'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'creator' => Yii::t('app', 'Creator'),
            'date_created' => Yii::t('app', 'Date Created'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
            'county_district' => Yii::t('app', 'County District'),
            'address3' => Yii::t('app', 'Address3'),
            'address4' => Yii::t('app', 'Address4'),
            'address5' => Yii::t('app', 'Address5'),
            'address6' => Yii::t('app', 'Address6'),
            'date_changed' => Yii::t('app', 'Date Changed'),
            'changed_by' => Yii::t('app', 'Changed By'),
            'uuid' => Yii::t('app', 'Uuid'),
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
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Creator0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
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
     * Gets query for [[ChangedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChangedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'changed_by']);
    }
}
