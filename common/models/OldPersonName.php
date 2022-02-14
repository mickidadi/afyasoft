<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person_name".
 *
 * @property int $person_name_id
 * @property int $preferred
 * @property int $person_id
 * @property string|null $prefix
 * @property string|null $given_name
 * @property string|null $middle_name
 * @property string|null $family_name_prefix
 * @property string|null $family_name
 * @property string|null $family_name2
 * @property string|null $family_name_suffix
 * @property string|null $degree
 * @property int|null $created_by
 * @property string|null $created_at
 * @property int $voided
 * @property int|null $voided_by
 * @property string|null $date_voided
 * @property string|null $void_reason
 * @property int|null $updated_by
 * @property string|null $updated_at
 * @property string $uuid
 *
 * @property Person $person
 * @property User $createdBy
 * @property User $voidedBy
 */
class OldPersonName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $age;
    public $living_place;
    public $room;
    public $track_scheme;
    
    public $insurance_type;
    public $payment_category;
    public $clinic_name;
     
    public $opd_service;
  

    public static function tableName()
    {
        return 'person_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preferred', 'person_id', 'created_by', 'voided', 'voided_by', 'updated_by'], 'integer'],
            [['person_id', 'given_name', 'family_name','living_place'], 'required'],
            [['created_at', 'date_voided', 'updated_at','age','opd_service','payment_category','clinic_name','insurance_type'], 'safe'],
            [['prefix', 'given_name', 'middle_name', 'family_name_prefix', 'family_name', 'family_name2', 'family_name_suffix', 'degree'], 'string', 'max' => 50],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
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
            'person_name_id' => Yii::t('app', 'Person Name ID'),
            'preferred' => Yii::t('app', 'Preferred'),
            'person_id' => Yii::t('app', 'Person ID'),
            'prefix' => Yii::t('app', 'Prefix'),
            'given_name' => Yii::t('app', 'Given Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'family_name_prefix' => Yii::t('app', 'Family Name Prefix'),
            'family_name' => Yii::t('app', 'Family Name'),
            'family_name2' => Yii::t('app', 'Family Name2'),
            'family_name_suffix' => Yii::t('app', 'Family Name Suffix'),
            'degree' => Yii::t('app', 'Degree'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'uuid' => Yii::t('app', 'Uuid'),
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
}
