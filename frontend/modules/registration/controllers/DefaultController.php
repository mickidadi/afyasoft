<?php

namespace frontend\modules\registration\controllers;

use common\models\Patient;
use common\models\User;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `registration` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSaveLocation()
    {
        $location_id = Yii::$app->request->post("location_id");
        $user_id = Yii::$app->user->identity->id;
        //update
        $model = User::find()->where(["id" => $user_id])->one();
        $model->location_id = $location_id;
        $model->save(false);
        //end

    }
    public function actionRoomStatus()
    {
       $model = Patient::getroomstatus();
        return $this->renderAjax('_room_status', [
            'model' => $model
        ]);
        //end

    }
    
}
