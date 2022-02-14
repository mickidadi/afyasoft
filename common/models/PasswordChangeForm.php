<?php

namespace common\models;

use Yii;
use kartik\password\StrengthValidator;

class PasswordChangeForm extends \yii\db\ActiveRecord {

   
    public $newpass;
   // public $lastName;
    public $oldpassword;
    public $repeatnewpass;


    public function rules() {
        return [
            [[ 'newpass', 'repeatnewpass','oldpassword'], 'required'],
            ['newpass', 'findPasswords'],
            ['newpass', 'match', 'pattern' => "/^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d\W]).*$/u", 'message' => 'Your Password should be 8 characters ,at least one digit, one upper case letter, one lower case letter and one special symbol.'],
           //[['newpass'], StrengthValidator::className(), 'preset' => 'normal', 'userAttribute' => 'username'],
            ['repeatnewpass', 'compare', 'compareAttribute' => 'newpass', 'message' => "Passwords don't match"],
        ];
    }

    public function findPasswords($attribute, $params) {
        $user = User::find()->where([
                    'id' => Yii::$app->user->identity->id])->one();
       //  echo  $hash = $user->password;
         //  exit();
     if ((Yii::$app->getSecurity()->validatePassword($this->oldpassword, $hash)) == TRUE) {
        if ((Yii::$app->getSecurity()->validatePassword($this->newpass, $hash)) != TRUE) {
              Yii::$app->getSession()->setFlash(
                                    'errorMessage', 'Please enter new password!'
                            );
            $this->addError($attribute, 'New Password can not be the same as default password!');
        }
    }
    else{
        Yii::$app->getSession()->setFlash(
            'errorMessage', 'Please enter old password!'
    );
$this->addError($attribute, 'Old Password is incorrect !');     
    }
    }

    public function attributeLabels() {
        return [
          
            'newpass' => 'New Password',
            'oldpassword' => 'Old Password',
            'repeatnewpass' => 'Repeat New Password',
        ];
    }

}
