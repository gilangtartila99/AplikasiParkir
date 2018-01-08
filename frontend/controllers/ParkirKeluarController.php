<?php

namespace frontend\controllers;

use Yii;
use common\models\ParkirKeluar;
use frontend\models\ParkirKeluarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParkirKeluarController implements the CRUD actions for ParkirKeluar model.
 */
class ParkirKeluarController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                            // allow authenticated users
                        [
                            'actions' => ['index','logout','view','create'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => [''],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                            // everything else is denied
                        ],
                        //'denyCallback' => function () {
                        //    return Yii::$app->response->redirect(['site/logout']);
                        //},
                    ],
        ];
    }

    /**
     * Displays a single ParkirKeluar model.
     * @param double $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ParkirKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        date_default_timezone_set("Asia/Jakarta");
        $model = new ParkirKeluar();
        $model->WAKTU_KELUAR = date('H:i:s');
        $model->TANGGAL_KELUAR = date('d-M-y');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PARKIR_KELUAR]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the ParkirKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return ParkirKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ParkirKeluar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
