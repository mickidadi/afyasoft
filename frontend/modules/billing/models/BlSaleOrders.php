<?php

namespace frontend\modules\billing\models;

use Yii;
use common\models\BlSaleQuoteLine;
use frontend\modules\billing\models\BlSaleOrdersLine;
use \frontend\modules\billing\models\base\BlSaleOrders as BaseBlSaleOrders;

/**
 * This is the model class for table "bl_sale_orders".
 */
class BlSaleOrders extends BaseBlSaleOrders
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
            [['patient_id'], 'required'],
            [['patient_id', 'visit_id', 'status', 'discounted', 'created_by', 'updated_by'], 'integer'],
            [['total_quote', 'payable_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
             
        ]);
    }
	public static function SaveOrders($quoteline){

    // Start here..
    $transaction = Yii::$app->db->beginTransaction();
    $patient_id=$quoteline["patient_id"];
    $quotes=$quoteline["selection"];
    try {
         
             $model= new BlSaleOrders();
                    $model->patient_id=$patient_id;
                    $model->total_quote=0;
                    $model->payable_amount=0;
                    $model->status=0;
        // # save the quoted model with validation check
        // if you want to disable the validation, you can use $model->save(false)
        if( $model->save()) {
            // # get the new invoice id that we just save
            $sale_order_id = $model->order_id;
            
            // # check time logs for inserting to the quotes detail model
            $flag = true;
            $total_amount=0;
            if(is_array($quotes) && count($quotes)>0 ) {
                foreach($quotes as $key=>$sale_quote_line_id) {
                     //find the item price 
                     $item_price=0;
                     
                     //end find item price
                    // # insert into order line detail model
                    $orderline = new BlSaleOrdersLine();
                    $orderline->sale_orders_id=$sale_order_id;
                    $orderline->sale_quote_line_id=$sale_quote_line_id;
                    if (!($flag = $orderline->save(false))) { // save Quate Line Data model without validation
                        $transaction->rollBack(); // if save fails then rollback
                        break;
                    }

                 //$total_amount += $orderline->quoted_amount; 
                 $order_status=Yii::$app->params['billing_status']['quote_line_Confirmed']; 
                 $model_quoteline= BlSaleQuoteLine::find()->where(["quote_line_id"=>$sale_quote_line_id])->one(); 
                       $model_quoteline->status=$order_status;
                 if (!($flag = $model_quoteline->save(false))) { // save Quate Line Data model without validation
                    $transaction->rollBack(); // if save fails then rollback
                    break;
                }           
                }
                 // $model->total_quote=$total_amount;
               // $model->save(false);
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
public static function getPayableAmount($sale_orders_id){
    $amount=0;
    $model=BlSaleOrdersLine::findBySql("SELECT SUM(payable_amount) as payable_amount FROM `bl_sale_orders_line` so 
                                              JOIN bl_sale_quote_line  sq on so.`sale_quote_line_id`=sq.`quote_line_id`
                                                WHERE `sale_orders_id`='{$sale_orders_id}'")->one();
                        if($model){
               $amount=$model->payable_amount;
                        }

    return $amount;
}
}
