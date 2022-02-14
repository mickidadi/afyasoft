<?php

namespace common\models;

use Yii;
use frontend\modules\pharmancy\models\Drug;
use \common\models\base\Concept as BaseConcept;

/**
 * This is the model class for table "concept".
 */
class Concept extends BaseConcept
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['description', 'form_text'], 'string'],
            [['datatype_id', 'class_id', 'created_by', 'updated_by', 'retired_by'], 'integer'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['concept_name_en', 'concept_name_type', 'short_name', 'retire_reason'], 'string', 'max' => 255],
            [['retired', 'is_set'], 'string', 'max' => 1],
            [['version'], 'string', 'max' => 50],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique']
        ]);
    }
    public static function saveConceptSet($concept_set,$concept_id){
        foreach($concept_set as $key=>$value){
            $model_concept_set=new ConceptAnswer();
                $model_concept_set->concept_id=$concept_id;
                $model_concept_set->answer_concept=$value;
             $model_concept_set->save();
         }
    }
    public static function saveConceptAnswer($concept_answer,$concept_id){
        
        foreach($concept_answer as $key=>$value){
            $model_concept_answer=new ConceptAnswer();
                $model_concept_answer->concept_id=$concept_id;
                $model_concept_answer->answer_concept=$value;
             $model_concept_answer->save();
         }
    }
    
    public static function getConceptAnswer($concept_id){
        $model=Concept::findBysql("SELECT ct.`concept_id` as id, `concept_name_en` as name FROM `concept` ct 
                                            JOIN concept_answer ca on ct.concept_id=ca.answer_concept 
                                                    WHERE ca.concept_id='{$concept_id}' AND ct.retired=0")->asArray()->all();
   return $model;
   
    }
    public static function getConceptSet($concept_id){
        $model=Concept::findBysql("SELECT ct.`concept_id` as id, `concept_name_en` as name FROM `concept` ct 
                         JOIN concept_set cs on ct.concept_id=cs.concept_id WHERE cs.concept_set='{$concept_id}' AND ct.retired=0 order by concept_name_en ASC")->asArray()->all();
   return $model;
   
    }
   
    public static function getInsuranceName($insurance_id){
        $insurance="";
        $model=Concept::find()->where(["concept_id"=>$insurance_id])->one();
          if($model){
            $insurance=$model->concept_name_en;
          }
   return $insurance;
   
    }
    public static function getCashType($concept_id){
        $cash="";
        $model=Concept::find()->where(["concept_id"=>$concept_id])->one();
          if($model){
            $cash=$model->concept_name_en;
          }
   return $cash;
   
    }
    public static function getSaleItemName($item_id,$service_type_id){
        $item_name="";
             if($service_type_id==3){
                $model=Drug::find()->where(["drug_id"=>$item_id])->one();
                if($model){
                  $item_name=$model->name;
                }
             }else{
        $model=Concept::find()->where(["concept_id"=>$item_id])->one();
          if($model){
            $item_name=$model->concept_name_en;
          }
        }
   return $item_name;
    }	
}
