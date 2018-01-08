<?php

namespace backend\controllers;

use Yii;
use common\models\Parkir;
use backend\models\ParkirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;

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
                            'actions' => ['index','logout','update','view','delete','create','cetakharian','cetakbulanan','cetaktahunan'],
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

    public function actionCetakharian($hari) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Parkir::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $models = $query
        ->andWhere(['HARI_PARKIR' => $hari])
        ->all();

        $content =  $this->render('cetakdataparkir',[
            'dataProvider' => $dataProvider,
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
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
                'SetFooter'=>['CREATED BY GILANG R. TARTILA'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionCetakbulanan($bulan) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Parkir::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $models = $query
        ->andWhere(['BULAN_PARKIR' => $bulan])
        ->all();

        $content =  $this->render('cetakdataparkir',[
            'dataProvider' => $dataProvider,
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
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
                'SetFooter'=>['CREATED BY GILANG R. TARTILA'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionCetaktahunan($tahun) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Parkir::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $models = $query
        ->andWhere(['TAHUN_PARKIR' => $tahun])
        ->all();

        $content =  $this->render('cetakdataparkir',[
            'dataProvider' => $dataProvider,
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
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
                'SetFooter'=>['CREATED BY GILANG R. TARTILA'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Lists all Parkir models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParkirSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
