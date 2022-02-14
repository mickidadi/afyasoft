<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 6/5/19
 * Time: 12:21 AM
 */

namespace common\models;
use backend\modules\security\SecurityModule;
use Yii;
use yii\base\Model;

class PasswordRecoverForm extends model
{
    public $email;
    public $phone;
    public $code;
    public $new_password;
    public $repeat_password;


    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'phone'], 'required'],

            // password is validated by validateEmail()
            ['repeat_password', 'validateEmail'],

            // password is validated by validateCode()
            //['code', 'validateCode'],

            ['code', 'validateCode', 'when' => function ($model) {
                return $model->email!== '';
            },
                'whenClient' => "function (attribute, value) { "
                    . " return $('#passwordrecoverform-email').val() !== ''; }"],

            ['code', 'required', 'when' => function ($model) {
                return $model->email!== '';
            },
                'whenClient' => "function (attribute, value) { "
                    . " return $('#passwordrecoverform-email').val() !== ''; }"],


            // password is validated by validatePassword()
            ['repeat_password', 'validatePassword'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'rememberMe'=>'Remember'
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $user = $this->getUser();

            if (!$user || $this->new_password !== $this->repeat_password) {
                $this->addError($attribute, 'Password Mismatch');
            }
        }
    }

    public function validateCode($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $user = $this->getUser();

            if (!$user || SecurityModule::encrypting($this->code) !== $user->password_reset_token) {
                $this->addError($attribute, 'Incorrect Code.');
            }
        }
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $username = $this->username;
            $email = $this->username;
            $SQL = "SELECT * FROM auth_user WHERE status='1' AND  (username = '$username' OR email = '$email')";
            $model = Yii::$app->db->createCommand($SQL)->queryAll();
            if (!$user || sizeof($model)==0) {
                $this->addError($attribute, 'Incorrect Email');
            }
        }
    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {

            $email = $username =$this->username;
            $SQL = "SELECT * FROM auth_user WHERE status='".SecurityModule::STATUS_ACTIVE."' AND  (username = '$username' OR email = '$email') LIMIT 1";
            $model= Yii::$app->db->createCommand($SQL)->queryAll();
            if (sizeof($model)!=0){
                $userModel = User::findOne($model[0]["id"]);
                $this->_user = $userModel;
            }
        }
        return $this->_user;
    }
}