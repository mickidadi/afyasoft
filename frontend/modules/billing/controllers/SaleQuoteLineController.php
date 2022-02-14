<?php

namespace frontend\modules\billing\controllers;

use Yii;
use yii\web\Controller;
use common\models\Visit;
use common\models\Patient;
use yii\filters\VerbFilter;
use common\models\BlSaleQuoteLine;
use yii\web\NotFoundHttpException;
use frontend\modules\billing\models\BlSaleQuoteLineSearch;

/**
 * SaleQuoteLineController implements the CRUD actions for BlSaleQuoteLine model.
 */
class SaleQuoteLineController extends Controller
{
    public function behaviors()
    {
        $this->layout = '@frontend/views/layouts/default_main';
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BlSaleQuoteLine models.
     * @return mixed
     */
    public function actionIndex($patient_uuid)
    {
        $patient_id=Patient::getPatientIdByUuid($patient_uuid);
        $visit_id=Visit::getVisitIdByPatientId($patient_id);
        $service_type=Yii::$app->params['concept_data']['medicine_service'];
        $searchModel = new BlSaleQuoteLineSearch();
        $dataProvider = $searchModel->searchclinical(Yii::$app->request->queryParams,$patient_id,$visit_id,$service_type);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlSaleQuoteLine model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerBlDiscount = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blDiscounts,
        ]);
        $providerBlSaleQuoteReferenceMap = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blSaleQuoteReferenceMaps,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerBlDiscount' => $providerBlDiscount,
            'providerBlSaleQuoteReferenceMap' => $providerBlSaleQuoteReferenceMap,
        ]);
    }

    /**
     * Creates a new BlSaleQuoteLine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlSaleQuoteLine();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_line_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BlSaleQuoteLine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new BlSaleQuoteLine();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_line_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BlSaleQuoteLine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
    * Creates a new BlSaleQuoteLine model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($id) {
        $model = new BlSaleQuoteLine();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_line_id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the BlSaleQuoteLine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlSaleQuoteLine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlSaleQuoteLine::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BlDiscount
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBlDiscount()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BlDiscount');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBlDiscount', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BlSaleQuoteReferenceMap
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBlSaleQuoteReferenceMap()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BlSaleQuoteReferenceMap');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBlSaleQuoteReferenceMap', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
