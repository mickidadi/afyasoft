<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use yii\helpers\Json;
use common\models\BlSaleQuote;

class ClinicalController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionPatientDashboard()
    {
       // return $this->renderPartial('_patient_dashboard');
        $html = $this->renderPartial('_order_page');
        return Json::encode($html);
    }
    public function actionPatientConsultation($action="",$id="")
    {
                  if(Yii::$app->request->post()){
                     if($action=="orders"){
                       
                         //generate qoutes
                        // print_r(Yii::$app->request->post());
                         $status_code=BlSaleQuote::saveQuote(Yii::$app->request->post());
                            if($status_code==200){
                                $sms = Yii::$app->params['code_constants']['create_alert'];
                                Yii::$app->getSession()->setFlash('success', $sms);
                             }else{
                                $sms = Yii::$app->params['code_constants']['errors_alert'];
                                Yii::$app->getSession()->setFlash('dangers', $sms);
                            }
            return $this->redirect(['patient-consultation', "action"=>$action,'id'=>$id]);      
                         //end
                     }
                 // exit();
                    }
        return $this->render('_patient_consultation',["action"=>$action,'uuid'=>$id]);
    }
}
