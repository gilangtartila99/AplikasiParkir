<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParkirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div align="center" class="parkir-index">

    <h1 align="center">Laporan Data Parkir</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        //'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'No Parkir',
                'attribute' => 'ID_PARKIR',
                'pageSummary' => 'Total',
            ],
            //'TANGGAL_PARKIR',
            [
                'label' => 'Tanggal Masuk',
                'value' => function($data) {
                    return Yii::$app->formatter->asDate($data->TANGGAL_PARKIR, 'dd MMMM yyyy');
                }
            ],
            'WAKTU_MASUK',
            [
                'label' => 'Tanggal Keluar',
                'value' => function($data) {
                    if($data->parkirkeluars['TANGGAL_KELUAR'] == '') {
                        return 'Belum Keluar';
                    } else {
                        return Yii::$app->formatter->asDate($data->parkirkeluars['TANGGAL_KELUAR'],'d MMMM Y');
                    }
                },
            ],
            [
                'label' => 'Waktu Keluar',
                'value' => function($data) {
                    if($data->parkirkeluars['WAKTU_KELUAR'] == '') {
                        return 'Belum Keluar';
                    } else {
                        return $data->parkirkeluars['WAKTU_KELUAR'];
                    }
                },
            ],
            'PLAT_NOMOR',
            [
                'label' => 'Jumlah Harga',
                'pageSummary' => true,
                'pageSummaryOptions' => ['ID_PARKIR' => 'HARGA'],
                'value' => function($data) {
                    return $data->harga['HARGA'];
                },
            ],
        ],
    ]); ?>
</div>
