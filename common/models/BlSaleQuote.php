<?php

namespace common\models;

use Yii;
use common\models\Visit;
use common\models\BlSaleQuote;
use common\models\BlSaleQuoteLine;
use frontend\modules\billing\models\DrugQuoteLine;
use \common\models\base\BlSaleQuote as BaseBlSaleQuote;

/**
 * This is the model class for table "bl_sale_quote".
 */
class BlSaleQuote extends BaseBlSaleQuote
{
    /**
     * @inheritdoc
     */
    public $firstName;
    public $middleName;
    public $lastName;
    public $phone_number;
    
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['patient', 'visit'], 'required'],
            [['patient', 'visit', 'created_by', 'status', 'discounted', 'updated_by'], 'integer'],
            [['total_quote', 'payable_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            
        ]);
    }
 
 public static function saveQuote($quotes)
{

    // Start here..
    $transaction = Yii::$app->db->beginTransaction();
    
    try {
          $patient_uuid=$quotes["patient_uuid"];
          $patient_id=Patient::getPatientIdByUuid($patient_uuid);
          $visit_id=Visit::getVisitIdByPatientId($patient_id);
          $visitattributeData=Visit::getVisitattributeIdByVisitId($visit_id);
          $service_type=Yii::$app->params['concept_data']['general_service'];
        $model= new BlSaleQuote();
                    $model->patient=$patient_id;
                    $model->visit=$visit_id;
                    $model->total_quote=0;
                    $model->payable_amount=0;
                    $model->status=Yii::$app->params['billing_status']['quote_main_new'];;
        // # save the quoted model with validation check
        // if you want to disable the validation, you can use $model->save(false)
        if( $model->save() ) {
            // # get the new invoice id that we just save
            $sale_quote_id = $model->quote_id;
            
            // # check time logs for inserting to the quotes detail model
            $flag = true;
            $total_amount=0;
            if( is_array($quotes) && count($quotes)>0 ) {
                foreach($quotes["order_data"] as $key=>$orders) {
                     //find the item price 
                     $item_price=0;
                     $payment_category=$visitattributeData->payment_category_concept_id;
                     $payment_sub_category=$visitattributeData->insurance_concept_id>0?$visitattributeData->insurance_concept_id:$visitattributeData->track_scheme_concept_id;
                      $model_price=BlItemPrice::find()->where(["item"=>$orders,"payment_category"=>$payment_category,"payment_sub_category"=>$payment_sub_category,"retired"=>0,'service_type'=> $service_type])->one();
                         if($model_price){
                           $item_price=$model_price->item_price_id;
                         }
                     //end find item price
                    // # insert into Quoted detail model
                    $quoteline = new BlSaleQuoteLine();
                    $quoteline->sale_quote=$sale_quote_id;
                    $quoteline->item=$orders;
                    $quoteline->service_type=$service_type;
                          if($item_price>0){
                    $quoteline->item_price=$item_price;
                    $quoteline->quoted_amount=$model_price->selling_price;
                    $quoteline->payable_amount=$model_price->selling_price;
                          }
                    $quoteline->quantity=1;
                    $quoteline->unit=1;
                    
                    $quoteline->payment_category=$payment_category;
                    $quoteline->payment_sub_category=$payment_sub_category;
                    $quoteline->status=Yii::$app->params['billing_status']['quote_line_new'];
                    if (!($flag = $quoteline->save(false))) { // save Quate Line Data model without validation
                        $transaction->rollBack(); // if save fails then rollback
                        break;
                    } 
                    $total_amount += $quoteline->quoted_amount;               
                }
                  $model->total_quote=$total_amount;
                $model->save(false);
            }
        }    
    
        // # save all transactions
        if($flag) {
            $transaction->commit();
            return 200;
        }
    
    } catch (Exception $e) {
        // # if error occurs then rollback all transactions
        $transaction->rollBack();

        return 404;
    }

}
public static function saveQuoteMedication($quotes,$patient_uuid)
{

    // Start here..
    $transaction = Yii::$app->db->beginTransaction();
    
    try {
         // $patient_uuid=$quotes["patient_uuid"];
          $patient_id=Patient::getPatientIdByUuid($patient_uuid);
          $visit_id=Visit::getVisitIdByPatientId($patient_id);
          $visitattributeData=Visit::getVisitattributeIdByVisitId($visit_id);
          $service_type=Yii::$app->params['concept_data']['medicine_service'];
        $model= new BlSaleQuote();
                    $model->patient=$patient_id;
                    $model->visit=$visit_id;
                    $model->total_quote=0;
                    $model->payable_amount=0;
                    $model->status=Yii::$app->params['billing_status']['quote_main_new'];;
        // # save the quoted model with validation check
        // if you want to disable the validation, you can use $model->save(false)
        if( $model->save() ) {
            // # get the new invoice id that we just save
            $sale_quote_id = $model->quote_id;
            
            // # check time logs for inserting to the quotes detail model
            $flag = true;
            $total_amount=$item_price=0;
           // if( is_array($quotes) && count($quotes)>0 ) {
                //foreach($quotes["order_data"] as $key=>$orders) {
                     //find the item price 
                     $payment_category=$visitattributeData->payment_category_concept_id;
                     $payment_sub_category=$visitattributeData->insurance_concept_id>0?$visitattributeData->insurance_concept_id:$visitattributeData->track_scheme_concept_id;
                      $model_price=BlItemPrice::find()->where(["item"=>$quotes->item,"payment_category"=>$payment_category,"payment_sub_category"=>$payment_sub_category,"retired"=>0,'service_type'=> $service_type])->one();
                         if($model_price){
                           $item_price=$model_price->item_price_id;
                         }
                     //end find item price
                    // # insert into Quoted detail model
                    $quoteline = new BlSaleQuoteLine();
                    $quoteline->sale_quote=$sale_quote_id;
                    $quoteline->item=$quotes->item;
                    $quoteline->service_type=$service_type;
                          if($item_price>0){
                    $quoteline->item_price=$item_price;
                    $quoteline->quoted_amount=$model_price->selling_price;
                    $quoteline->payable_amount=$model_price->selling_price;
                          }
                     $quoteline->quantity=1;
                   // $quoteline->unit=1;
                    
                    $quoteline->payment_category=$payment_category;
                    $quoteline->payment_sub_category=$payment_sub_category;
                    $quoteline->status=Yii::$app->params['billing_status']['quote_line_new'];
                    $quoteline->duration=$quotes->duration;
                    $quoteline->duration_units=$quotes->duration_units;
                    $quoteline->route=$quotes->route;
                    $quoteline->dose=$quotes->dose;
                    $quoteline->dose_units=$quotes->dose_units;
                    $quoteline->frequency=$quotes->frequency;
                    $quoteline->comment=$quotes->comment;
                    if (!($flag = $quoteline->save(false))) { // save Quate Line Data model without validation
                        $transaction->rollBack(); // if save fails then rollback
                       // break;
                    } 
                    //save Drugs items data
                       /*  if($quoteline){
                      $quotelinedrug= new DrugQuoteLine();
                                $quotelinedrug->quote_line_id=$quoteline->quote_line_id;
                                $quotelinedrug->drug_inventory_id=$quotes->drug_inventory_id;
                                $quotelinedrug->patient_id=
                                $quotelinedrug->duration=$quotes->duration;
                                $quotelinedrug->duration_units=$quotes->duration_units;
                                $quotelinedrug->route=$quotes->route;
                                $quotelinedrug->dose=$quotes->dose;
                                $quotelinedrug->dose_units=$quotes->dose_units;
                                $quotelinedrug->frequency=$quotes->frequency;
                                $quotelinedrug->dosing_instructions=$quotes->dosing_instructions;
                      if (!($flag = $quotelinedrug->save(false))) { // save Quote Line drugs Data model without validation
                        $transaction->rollBack(); // if save fails then rollback
                       // break;
                    } 
                }*/
                    //end drug data
                    $total_amount += $quoteline->quoted_amount;               
               // }
                  $model->total_quote=$total_amount;
                $model->save(false);
          //  }
        }    
    
        // # save all transactions
        if($flag) {
            $transaction->commit();
            return 200;
        }
    
    } catch (Exception $e) {
        // # if error occurs then rollback all transactions
        $transaction->rollBack();

        return 404;
    }

}
public static function getItem($quoteline)
{
  
}
}
