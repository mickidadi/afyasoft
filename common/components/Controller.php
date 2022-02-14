<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Mickidadi Kosiyanga
 * @email mickidadimsoka@gmail.com
 */

namespace common\components;
use Yii;
use yii\web\ForbiddenHttpException;

class Controller extends \yii\web\Controller {

    //put your code here
    public function beforeAction($action) {
        //Actions that dont require login 
        $dontRequireLogin = array();
        array_push($dontRequireLogin, '/site/index');
        array_push($dontRequireLogin, '/site/login');
        array_push($dontRequireLogin, '/site/logout');
        array_push($dontRequireLogin, '/site/changepassword');
        array_push($dontRequireLogin, '/site/help');
        array_push($dontRequireLogin, '/site/signups');
        array_push($dontRequireLogin, '/site/home');
        array_push($dontRequireLogin, '/site/captcha');
        array_push($dontRequireLogin, '/site/confirm');
        array_push($dontRequireLogin, '/site/academic');
        array_push($dontRequireLogin, '/site/updateprofile');
        array_push($dontRequireLogin, '/site/school-home');
        array_push($dontRequireLogin, '/site/home-school');
        array_push($dontRequireLogin, '/site/home2');
          //Actions accessible by any user, but must login first 
        $mustLogin = array();
      
        $action_id = \Yii::$app->controller->action->id;
        $controller_id = \Yii::$app->controller->id;
       // $module_id = Yii::$app->controller->module->id;
        $uaction = "/{$controller_id}/{$action_id}";
        //$uaction_btrimmed1 =str_replace('/app-backend', '', $uaction);
        //$uaction_btrimmed =str_replace('/app-frontend', '', $uaction);
        //A user must first login
        if (\Yii::$app->user->isGuest && !in_array($uaction, $dontRequireLogin)) {
            
         $this->redirect(['site/login']);   
        }
        
    
        //checking if user is allowed to access this action
        if (!Yii::$app->user->can($uaction) && !in_array($uaction, $dontRequireLogin)) {
              if(!$action instanceof \yii\web\ErrorAction) {
           throw new ForbiddenHttpException("Sorry, you are not allowed to perform this action!");
              }
        }

      
        //checking if user is logged in
        if (in_array($uaction, $mustLogin)) {
            if (\Yii::$app->user->isGuest) {
              $this->redirect(['/site/login']);
            } 
        }
      
        return parent::beforeAction($action);
    }

}


