<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParkirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Parkir';
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="parkir-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Parkir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            'WAKTU_MASUK',
            [
                'label' => 'Tanggal Masuk',
                'value' => function($data) {
                    return Yii::$app->formatter->asDate($data->TANGGAL_PARKIR, 'dd MMMM yyyy');
                }
            ],
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
            /*[
                'label' => 'Bulan Parkir',
                'value' => function($data) {
                    if($data->BULAN_PARKIR == 01)
                    {
                        return 'Januari';
                    }
                    elseif($data->BULAN_PARKIR == 02)
                    {   
                        return 'Februari';
                    }
                    elseif($data->BULAN_PARKIR == 03)
                    {   
                        return 'Maret';
                    }
                    elseif($data->BULAN_PARKIR == 04)
                    {   
                        return 'April';
                    }
                    elseif($data->BULAN_PARKIR == 05)
                    {   
                        return 'Mei';
                    }
                    elseif($data->BULAN_PARKIR == 06)
                    {   
                        return 'Juni';
                    }
                    elseif($data->BULAN_PARKIR == 07)
                    {   
                        return 'Juli';
                    }
                    elseif($data->BULAN_PARKIR == 08)
                    {   
                        return 'Agustus';
                    }
                    elseif($data->BULAN_PARKIR == 09)
                    {   
                        return 'September';
                    }
                    elseif($data->BULAN_PARKIR == 10)
                    {   
                        return 'Oktober';
                    }
                    elseif($data->BULAN_PARKIR == 11)
                    {   
                        return 'November';
                    }
                    elseif($data->BULAN_PARKIR == 12)
                    {   
                        return 'Desember';
                    }
                },
            ],*/
            //'TAHUN_PARKIR',
            'PLAT_NOMOR',
            [
                'label' => 'Jumlah Harga',
                'pageSummary' => true,
                'value' => function($data) {
                    if($data->harga['HARGA'] == ''){
                        return 'Belum Keluar';
                    } else {
                        return $data->harga['HARGA'];
                    }
                },
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
