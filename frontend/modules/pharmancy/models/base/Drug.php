<?php

namespace frontend\modules\pharmancy\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "drug".
 *
 * @property integer $drug_id
 * @property integer $concept_id
 * @property string $name
 * @property integer $combination
 * @property integer $dosage_form
 * @property double $maximum_daily_dose
 * @property double $minimum_daily_dose
 * @property integer $route
 * @property integer $created_by
 * @property string $created_at
 * @property integer $retired
 * @property integer $updated_by
 * @property string $updated_at
 * @property integer $retired_by
 * @property string $date_retired
 * @property string $retire_reason
 * @property string $uuid
 * @property string $strength
 *
 * @property \frontend\modules\pharmancy\models\ConceptAnswer[] $conceptAnswers
 * @property \frontend\modules\pharmancy\models\Concept $dosageForm
 * @property \frontend\modules\pharmancy\models\User $updatedBy
 * @property \frontend\modules\pharmancy\models\User $createdBy
 * @property \frontend\modules\pharmancy\models\User $retiredBy
 * @property \frontend\modules\pharmancy\models\Concept $concept
 * @property \frontend\modules\pharmancy\models\Concept $route0
 * @property \frontend\modules\pharmancy\models\DrugIngredient[] $drugIngredients
 * @property \frontend\modules\pharmancy\models\Concept[] $ingredients
 * @property \frontend\modules\pharmancy\models\DrugOrderLine[] $drugOrderLines
 * @property \frontend\modules\pharmancy\models\DrugQuoteLine[] $drugQuoteLines
 * @property \frontend\modules\pharmancy\models\DrugReferenceMap[] $drugReferenceMaps
 * @property \frontend\modules\pharmancy\models\Obs[] $obs
 * @property \frontend\modules\pharmancy\models\PhItemDrug $phItemDrug
 */
class Drug extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'conceptAnswers',
            'dosageForm',
            'updatedBy',
            'createdBy',
            'retiredBy',
            'concept',
            'route0',
            'drugIngredients',
            'ingredients',
            'drugOrderLines',
            'drugQuoteLines',
            'drugReferenceMaps',
            'obs',
            'phItemDrug'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concept_id', 'dosage_form', 'route', 'created_by', 'updated_by', 'retired_by'], 'integer'],
            [['maximum_daily_dose', 'minimum_daily_dose'], 'number'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['name', 'retire_reason', 'strength'], 'string', 'max' => 255],
            [['combination', 'retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'drug_id' => Yii::t('app', 'Drug ID'),
            'concept_id' => Yii::t('app', 'Concept ID'),
            'name' => Yii::t('app', 'Name'),
            'combination' => Yii::t('app', 'Combination'),
            'dosage_form' => Yii::t('app', 'Dosage Form'),
            'maximum_daily_dose' => Yii::t('app', 'Maximum Daily Dose'),
            'minimum_daily_dose' => Yii::t('app', 'Minimum Daily Dose'),
            'route' => Yii::t('app', 'Route'),
            'retired' => Yii::t('app', 'Retired'),
            'retired_by' => Yii::t('app', 'Retired By'),
            'date_retired' => Yii::t('app', 'Date Retired'),
            'retire_reason' => Yii::t('app', 'Retire Reason'),
            'uuid' => Yii::t('app', 'Uuid'),
            'strength' => Yii::t('app', 'Strength'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptAnswers()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\ConceptAnswer::className(), ['answer_drug' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosageForm()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\Concept::className(), ['concept_id' => 'dosage_form']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\User::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetiredBy()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\User::className(), ['id' => 'retired_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcept()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\Concept::className(), ['concept_id' => 'concept_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute0()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\Concept::className(), ['concept_id' => 'route']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugIngredients()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\DrugIngredient::className(), ['drug_id' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\Concept::className(), ['concept_id' => 'ingredient_id'])->viaTable('drug_ingredient', ['drug_id' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugOrderLines()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\DrugOrderLine::className(), ['drug_inventory_id' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugQuoteLines()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\DrugQuoteLine::className(), ['drug_inventory_id' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugReferenceMaps()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\DrugReferenceMap::className(), ['drug_id' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObs()
    {
        return $this->hasMany(\frontend\modules\pharmancy\models\Obs::className(), ['value_drug' => 'drug_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhItemDrug()
    {
        return $this->hasOne(\frontend\modules\pharmancy\models\PhItemDrug::className(), ['drug_id' => 'drug_id']);
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
