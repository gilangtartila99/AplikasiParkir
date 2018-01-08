<?php

namespace frontend\controllers;

use Yii;
use common\models\Parkir;
use frontend\models\ParkirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

/**
 * ParkirController implements the CRUD actions for Parkir model.
 */
class ParkirController extends Controller
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
                            'actions' => ['index','logout','view','create','cetakparkir'],
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

    public function actionCetakparkir($id) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Parkir::find();
        $models = $query
        ->where(['ID_PARKIR' => $id,])
        ->all();

        $content =  $this->render('cetakparkir',[
            'models' => $models,
            'model' => $this->findModel($id),
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A7,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content, 
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',

            'options' => [
                'title' => 'Sistem Parkir'
            ],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['SISTEM PARKIR'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        $pdf->getApi()->SetJS('this.print();');

        // return the pdf output as per the destination setting
        return $pdf->render();
        $this->goBack();
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionBarcode()
    {
        return $this->render('barcode');
    }

    /**
     * Displays a single Parkir model.
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
     * Creates a new Parkir model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        date_default_timezone_set("Asia/Jakarta");
        $model = new Parkir();
        $model->ID_PARKIR = date('dmyhis');
        $model->TANGGAL_PARKIR = date('d-M-y');
        $model->HARI_PARKIR = date('d');
        $model->BULAN_PARKIR = date('m');
        $model->TAHUN_PARKIR = date('Y');
        $model->WAKTU_MASUK = date('H:i:s');
        $model->HARGA = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PARKIR]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Parkir model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return Parkir the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parkir::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
