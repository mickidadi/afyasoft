<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "concept".
 *
 * @property integer $concept_id
 * @property string $concept_name_en
 * @property string $concept_name_type
 * @property integer $retired
 * @property string $short_name
 * @property string $description
 * @property string $form_text
 * @property integer $datatype_id
 * @property integer $class_id
 * @property integer $is_set
 * @property integer $created_by
 * @property string $created_at
 * @property string $version
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property string $uuid
 *
 * @property \common\models\Allergy[] $allergies
 * @property \common\models\AllergyReaction[] $allergyReactions
 * @property \common\models\ConceptClass $class
 * @property \common\models\User $createdBy
 * @property \common\models\ConceptDatatype $datatype
 * @property \common\models\User $updatedBy
 * @property \common\models\User $retiredBy
 * @property \common\models\ConceptAnswer[] $conceptAnswers
 * @property \common\models\ConceptNumeric $conceptNumeric
 * @property \common\models\ConceptSet[] $conceptSets
 * @property \common\models\ConceptStateConversion[] $conceptStateConversions
 * @property \common\models\Conditions[] $conditions
 * @property \common\models\Drug[] $drugs
 * @property \common\models\DrugIngredient[] $drugIngredients
 * @property \common\models\DrugOrder[] $drugOrders
 * @property \common\models\Obs[] $obs
 * @property \common\models\OrderFrequency $orderFrequency
 * @property \common\models\OrderSetMember[] $orderSetMembers
 * @property \common\models\Orders[] $orders
 * @property \common\models\PatientProgram[] $patientPrograms
 * @property \common\models\Person[] $people
 * @property \common\models\Program[] $programs
 * @property \common\models\ProgramWorkflow[] $programWorkflows
 * @property \common\models\ProgramWorkflowState[] $programWorkflowStates
 * @property \common\models\TestOrder[] $testOrders
 * @property \common\models\Visit[] $visits
 */
class Concept extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

  

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'allergies',
            'allergyReactions',
            'class',
            'createdBy',
            'datatype',
            'updatedBy',
            'retiredBy',
            'conceptAnswers',
            'conceptNumeric',
            'conceptSets',
            'conceptStateConversions',
            'conditions',
            'drugs',
            'drugIngredients',
            'drugOrders',
            'obs',
            'orderFrequency',
            'orderSetMembers',
            'orders',
            'patientPrograms',
            'people',
            'programs',
            'programWorkflows',
            'programWorkflowStates',
            'testOrders',
            'visits'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'form_text'], 'string'],
            [['datatype_id', 'class_id', 'created_by', 'updated_by', 'retired_by'], 'integer'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['concept_name_en', 'concept_name_type', 'short_name', 'retire_reason'], 'string', 'max' => 255],
            [['retired', 'is_set'], 'string', 'max' => 1],
            [['version'], 'string', 'max' => 50],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concept';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'concept_id' => Yii::t('app', 'Concept ID'),
            'concept_name_en' => Yii::t('app', 'Concept Name En'),
            'concept_name_type' => Yii::t('app', 'Concept Name Type'),
            'retired' => Yii::t('app', 'Retired'),
            'short_name' => Yii::t('app', 'Short Name'),
            'description' => Yii::t('app', 'Description'),
            'form_text' => Yii::t('app', 'Form Text'),
            'datatype_id' => Yii::t('app', 'Datatype ID'),
            'class_id' => Yii::t('app', 'Class ID'),
            'is_set' => Yii::t('app', 'Is Set'),
            'version' => Yii::t('app', 'Version'),
            'retired_by' => Yii::t('app', 'Retired By'),
            'date_retired' => Yii::t('app', 'Date Retired'),
            'retire_reason' => Yii::t('app', 'Retire Reason'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllergies()
    {
        return $this->hasMany(\common\models\Allergy::className(), ['severity_concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllergyReactions()
    {
        return $this->hasMany(\common\models\AllergyReaction::className(), ['reaction_concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(\common\models\ConceptClass::className(), ['concept_class_id' => 'class_id']);
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
    public function getDatatype()
    {
        return $this->hasOne(\common\models\ConceptDatatype::className(), ['concept_datatype_id' => 'datatype_id']);
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
    public function getRetiredBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'retired_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptAnswers()
    {
        return $this->hasMany(\common\models\ConceptAnswer::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptNumeric()
    {
        return $this->hasOne(\common\models\ConceptNumeric::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptSets()
    {
        return $this->hasMany(\common\models\ConceptSet::className(), ['concept_set' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptStateConversions()
    {
        return $this->hasMany(\common\models\ConceptStateConversion::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConditions()
    {
        return $this->hasMany(\common\models\Conditions::className(), ['end_reason' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugs()
    {
        return $this->hasMany(\common\models\Drug::className(), ['drug_id' => 'drug_id'])->viaTable('drug_ingredient', ['ingredient_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugIngredients()
    {
        return $this->hasMany(\common\models\DrugIngredient::className(), ['units' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugOrders()
    {
        return $this->hasMany(\common\models\DrugOrder::className(), ['route' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObs()
    {
        return $this->hasMany(\common\models\Obs::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderFrequency()
    {
        return $this->hasOne(\common\models\OrderFrequency::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderSetMembers()
    {
        return $this->hasMany(\common\models\OrderSetMember::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(\common\models\Orders::className(), ['order_reason' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPrograms()
    {
        return $this->hasMany(\common\models\PatientProgram::className(), ['outcome_concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(\common\models\Person::className(), ['cause_of_death' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(\common\models\Program::className(), ['outcomes_concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramWorkflows()
    {
        return $this->hasMany(\common\models\ProgramWorkflow::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramWorkflowStates()
    {
        return $this->hasMany(\common\models\ProgramWorkflowState::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestOrders()
    {
        return $this->hasMany(\common\models\TestOrder::className(), ['specimen_source' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(\common\models\Visit::className(), ['indication_concept_id' => 'concept_id']);
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
