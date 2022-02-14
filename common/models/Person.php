<?php

namespace common\models;

use common\components\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "person".
 *
 * @property int $person_id
 * @property string $given_name
 * @property string|null $middle_name
 * @property string $family_name
 * @property string|null $gender
 * @property string|null $birthdate
 * @property int $birthdate_estimated
 * @property int $dead
 * @property string|null $death_date
 * @property int|null $cause_of_death
 * @property int|null $created_by
 * @property string $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 * @property int $voided
 * @property int|null $voided_by
 * @property string|null $date_voided
 * @property string|null $void_reason
 * @property string $uuid
 * @property int $deathdate_estimated
 * @property string|null $birthtime
 *
 * @property LogicRuleToken[] $logicRuleTokens
 * @property LogicRuleToken[] $logicRuleTokens0
 * @property Obs[] $obs
 * @property Patient $patient
 * @property Concept $causeOfDeath
 * @property User $updatedBy
 * @property User $createdBy
 * @property User $voidedBy
 * @property PersonAddress[] $personAddresses
 * @property PersonAttribute[] $personAttributes
 * @property PersonMergeLog[] $personMergeLogs
 * @property PersonMergeLog[] $personMergeLogs0
 * @property PersonName[] $personNames
 * @property Provider[] $providers
 * @property Relationship[] $relationships
 * @property Relationship[] $relationships0
 * @property User[] $users
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
   // public $age;
    public $room;
    public $track_scheme_concept_id;
    public $day;
    public $month;
    public $year;
    public $visit_type;
    public $insurance_concept_id;
    public $payment_category_concept_id;
    public $clinic_name;
    public $insurance_number;
    public $opd_service;
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['given_name', 'family_name','age','gender'], 'required'],
            [['insurance_concept_id','room','payment_category_concept_id','birthdate','insurance_number','visit_type', 'death_date','phone_number', 'created_at', 'updated_at', 'date_voided', 'birthtime','year','month','day','living_place'], 'safe'],
            [['birthdate_estimated', 'dead', 'cause_of_death', 'created_by', 'updated_by', 'voided', 'voided_by', 'deathdate_estimated'], 'integer'],
            [['given_name', 'middle_name', 'family_name'], 'string', 'max' => 200],
            [['gender'], 'string', 'max' => 50],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            [['cause_of_death'], 'exist', 'skipOnError' => true, 'targetClass' => Concept::className(), 'targetAttribute' => ['cause_of_death' => 'concept_id']],
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
            'person_id' => Yii::t('app', 'Person ID'),
            'given_name' => Yii::t('app', 'Given Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'family_name' => Yii::t('app', 'Family Name'),
            'gender' => Yii::t('app', 'Gender'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'birthdate_estimated' => Yii::t('app', 'Birthdate Estimated'),
            'dead' => Yii::t('app', 'Dead'),
            'death_date' => Yii::t('app', 'Death Date'),
            'cause_of_death' => Yii::t('app', 'Cause Of Death'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'voided' => Yii::t('app', 'Voided'),
            'voided_by' => Yii::t('app', 'Voided By'),
            'date_voided' => Yii::t('app', 'Date Voided'),
            'void_reason' => Yii::t('app', 'Void Reason'),
            'uuid' => Yii::t('app', 'Uuid'),
            'deathdate_estimated' => Yii::t('app', 'Deathdate Estimated'),
            'birthtime' => Yii::t('app', 'Birthtime'),
        ];
    }

    /**
     * Gets query for [[LogicRuleTokens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogicRuleTokens()
    {
        return $this->hasMany(LogicRuleToken::className(), ['changed_by' => 'person_id']);
    }

    /**
     * Gets query for [[LogicRuleTokens0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogicRuleTokens0()
    {
        return $this->hasMany(LogicRuleToken::className(), ['creator' => 'person_id']);
    }

    /**
     * Gets query for [[Obs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObs()
    {
        return $this->hasMany(Obs::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['patient_id' => 'person_id']);
    }

    /**
     * Gets query for [[CauseOfDeath]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCauseOfDeath()
    {
        return $this->hasOne(Concept::className(), ['concept_id' => 'cause_of_death']);
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
     * Gets query for [[PersonAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonAddresses()
    {
        return $this->hasMany(PersonAddress::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[PersonAttributes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonAttributes()
    {
        return $this->hasMany(PersonAttribute::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[PersonMergeLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonMergeLogs()
    {
        return $this->hasMany(PersonMergeLog::className(), ['loser_person_id' => 'person_id']);
    }

    /**
     * Gets query for [[PersonMergeLogs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonMergeLogs0()
    {
        return $this->hasMany(PersonMergeLog::className(), ['winner_person_id' => 'person_id']);
    }

    /**
     * Gets query for [[PersonNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonNames()
    {
        return $this->hasMany(PersonName::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Providers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProviders()
    {
        return $this->hasMany(Provider::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Relationships]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['person_a' => 'person_id']);
    }

    /**
     * Gets query for [[Relationships0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships0()
    {
        return $this->hasMany(Relationship::className(), ['person_b' => 'person_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['person_id' => 'person_id']);
    }
    public static function registerpatient($model)
       {

    // Start here..
    $transaction = Yii::$app->db->beginTransaction();
    try {
        $flag = true;
        if($model->save()){
            
            $model_patient = new Patient();
               $model_patient->patient_id=$model->person_id;
              // $model_patient->save(false);
              
            if (!($flag =$model_patient->save(false))) {
                $transaction->rollBack(); // if save fails then rollback
                // break;
            } 
            //save  the patient visit
           // print_r($model_patient);
           // exit();
             $model_visit= new Visit();
                    $model_visit->patient_id=$model_patient->patient_id;
                    $model_visit->visit_type_id=$model->visit_type;
                    $model_visit->date_started=date("Y-m-d H:m:s");
                    $model_visit->location_id=1;
             // $model_visit->save();
           
                  // print_r($model_visit->error());
                  //   exit(); 
             if (!($flag =$model_visit->save(false))) {
                $transaction->rollBack(); // if save fails then rollback
                // break;
             } 
            //end
            //save visit attribute
            $payment_model=$model->payment_category_concept_id; 
            $model_visit_attr= new VisitAttribute();
                   $model_visit_attr->visit_id=$model_visit->visit_id;
                   $model_visit_attr->payment_category_concept_id=$payment_model;
                        if($payment_model==4031){
                   $model_visit_attr->insurance_concept_id=$model->insurance_concept_id;
                   $model_visit_attr->insurance_number=$model->insurance_number;
                        }else{
                   $model_visit_attr->track_scheme_concept_id=$model->track_scheme_concept_id;
                        }
                   $model_visit_attr->attribute_type_id=1;
                   $model_visit_attr->location_id=$model->room;
                   $model_visit_attr->value_reference="OPD";
           // $model_visit_attr->save(false);
            if (!($flag =$model_visit_attr->save(false))) { 
                $transaction->rollBack(); // if save fails then rollback
                // break;
            }
            //doctor room history
                $model_room= new PatientDoctorRoom();
                $model_room->patient_id=$model_patient->patient_id;
                $model_room->location_id=$model->room;
                $model_room->visit_id=$model_visit->visit_id;
               $model_room->save(false);
               
            }
        // # save all transactions
        if($flag) {
            $transaction->commit();
            return 200;
        }
    } catch (Exception $e) {
        // # if error occurs then rollback all transactions
        $transaction->rollBack();

        return $e;
    }

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
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'uuid',
            ],
        ];
    }
}
