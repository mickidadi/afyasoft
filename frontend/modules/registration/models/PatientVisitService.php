<?php

namespace frontend\modules\registration\models;

use Yii;
use yii\base\Model;

class PatientVisitService extends Model
{
   
    public $room;
    public $track_scheme_concept_id;
    public $visit_type;
    public $insurance_concept_id;
    public $payment_category_concept_id;
    public $insurance_number;
    public $opd_service;
    public $patient_id;
    public $clinic_name;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room','payment_category_concept_id','opd_service','visit_type'], 'required'],
            ['insurance_concept_id', 'required','when' => function ($model) { 
                    return $model->payment_category_concept_id == 4031; 
                }, 
                'whenClient' => "function (attribute, value) { 
                    return $('#patientvisitservice-payment_category_concept_id').val() == '4031'; 
                }"
            ],
            ['track_scheme_concept_id', 'required','when' => function ($model) { 
                return $model->payment_category_concept_id == 4030; 
            }, 
            'whenClient' => "function (attribute, value) { 
                return $('#patientvisitservice-payment_category_concept_id').val() == '4030'; 
            }"
           ],
            [['insurance_concept_id','patient_id','room','payment_category_concept_id','insurance_number','visit_type',"clinic_name","track_scheme_concept_id"], 'safe'],
            
           
        ];
    }
  
}
