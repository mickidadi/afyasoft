<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use yii\db\Query;
use yii\web\Response;
use yii\web\Controller;
use common\models\Concept;
use frontend\modules\pharmancy\models\Drug;

/**
 * Default controller for the `clinical` module
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
    public function actionConceptList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('concept_id AS id, concept_name_en AS text')
                ->from('concept')
                ->where(['like', 'concept_name_en', $q])
               // ->where(['=', 'concept_name_en', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Concept::find($id)->concept_name_en];
        }
        return $out;
    }
    public function actionDrugList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('drug_id AS id, name AS text')
                ->from('drug')
                ->where(['like', 'name', $q])
               // ->where(['=', 'concept_name_en', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Drug::find($id)->name];
        }
        return $out;
    }
}
