<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Parkir */

$this->title = $model->PLAT_NOMOR;
$this->params['breadcrumbs'][] = ['label' => 'Sistem Parkir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .padding {
        padding: 10px;
        font-size: 30px;
    }
</style>
<div align="center" class="parkir-view">

    <h1>Plat Nomor : <b><?= Html::encode($this->title) ?></b></h1>

    <p>
        <?= Html::a('Kembali', ['create','id' => 1], ['class' => 'btn-lg btn-primary padding']) ?>
    </p>
    <p>
        <?= Html::a('Cetak Kartu Parkir', ['cetakparkir', 'id' => $model->ID_PARKIR], ['class' => 'btn-lg btn-danger padding']) ?>
    </p>

    <?= \PHPQRCode\QRcode::png($model->ID_PARKIR, "qrcode/".$model->ID_PARKIR.".png", 'L', 4, 2); ?>
    <center><?= Html::img(Yii::getAlias('@imgfrontend')."/".$model['ID_PARKIR'].".png", ['width' => '200px']); ?></center>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PARKIR',
            [
                'label' => 'Tanggal Pesan',
                'value' => function($data) {
                    return Yii::$app->formatter->asDate($data->TANGGAL_PARKIR,'d MMMM Y');
                }
            ],
            'WAKTU_MASUK',
            [
                'label' => 'Tanggal Keluar',
                'value' => function($data) {
                    if($data->parkirkeluars['TANGGAL_PARKIR'] == '') {
                        return 'Belum Keluar';
                    } else {
                        return Yii::$app->formatter->asDate($data->parkirkeluars['TANGGAL_PARKIR'],'d MMMM Y');
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
            //'BULAN_PARKIR',
            //'TAHUN_PARKIR',
            'PLAT_NOMOR',
            
        ],
    ]) ?>

</div>
