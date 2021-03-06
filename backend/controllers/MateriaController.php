<?php

namespace backend\controllers;

use Yii;
use backend\models\Materia;
use backend\models\MateriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * MateriaController implements the CRUD actions for Materia model.
 */
class MateriaController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Materia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MateriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materia model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {

        if (Yii::$app->user->can('crear')){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }else{
        throw new ForbiddenHttpException;
        }
    }

    /**
     * Creates a new Materia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Materia();

        if (Yii::$app->user->can('crear')){

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODIGO_MATERIA]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }else{
        throw new ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing Materia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CODIGO_MATERIA]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Materia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Materia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Materia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
