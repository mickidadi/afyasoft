<?php

namespace backend\modules\configuration\controllers;

use Yii;
use common\models\Concept;
use backend\modules\configuration\models\ConceptSearch;
use common\models\base\ConceptAnswer;
use common\models\base\ConceptNumeric;
use common\models\base\ConceptSet;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConceptController implements the CRUD actions for Concept model.
 */
class ConceptController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Concept models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConceptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Concept model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Concept model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Concept();
       //concept set
         $model_concept_set=new ConceptSet();
       //end concept answer
       $model_concept_answer=new ConceptAnswer();
       //concept numeric
       $model_concept_numeric=new ConceptNumeric();
        if ($model->load(Yii::$app->request->post()) && $model->save()&&$model_concept_answer->load(Yii::$app->request->post())&&$model_concept_set->load(Yii::$app->request->post())&&$model_concept_numeric->load(Yii::$app->request->post())) {
             $concept_set_data= $concept_answer_data="";
              if($model_concept_answer->is_set==1){
                $concept_set=$model_concept_set->concept_id;
                if(count($concept_set)>0){
                concept::saveConceptSet($concept_set,$model->concept_id);
                $concept_set_data=implode(",",$concept_set);
                }
               }
               if($model->datatype_id==1){
                  $model_concept_numeric->concept_id=$model->concept_id;
                $model_concept_numeric->save();
               }
               $concept_answer=$model_concept_answer->answer_concept;
               if($model->datatype_id==2){
                 if(count($concept_answer)>0){
                concept::saveConceptAnswer($concept_answer,$model->concept_id);
                $concept_answer_data=implode(",",$concept_answer);
                   }
               }
              //update concept
                $model->concept_set=$concept_set_data;
                $model->concept_answer=$concept_answer_data;
               $model->save();
              //end
      return $this->redirect(['view', 'id' => $model->concept_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'model_concept_set' => $model_concept_set,
            'model_concept_answer' => $model_concept_answer,
            'model_concept_numeric' => $model_concept_numeric,
        ]);
    }

    /**
     * Updates an existing Concept model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->concept_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Concept model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Concept model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Concept the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Concept::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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
}
