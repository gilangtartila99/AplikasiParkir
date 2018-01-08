<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ParkirKeluar */

$this->title = $model->parkirs->PLAT_NOMOR;
$this->params['breadcrumbs'][] = ['label' => 'Sistem Parkir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="parkir-keluar-view">

<style type="text/css">
    .font-size {
        font-size: 150px;
    }
</style>

    <h3>Plat Nomor : <b><?= Html::encode($this->title) ?></b></h3>

    <p>
        <?= Html::a('Kembali', ['create'], ['class' => 'btn-lg btn-primary padding']) ?>
    </p>

    <font class="font-size"><b><?= $model->parkirs->harga->HARGA ?></b></font>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_PARKIR_KELUAR',
            'PARKIR_ID',
            [
                'label' => 'Tanggal Pesan',
                'value' => function($data) {
                    return Yii::$app->formatter->asDate($data->parkirs['TANGGAL_PARKIR'],'d MMMM Y');
                }
            ],
            [
                'label' => 'Waktu Masuk',
                'value' => function($data) {
                    return $data->parkirs['WAKTU_MASUK'];
                },
            ],
            //'TANGGAL_KELUAR',
            [
                'label' => 'Tanggal Keluar',
                'value' => function($data) {
                    return Yii::$app->formatter->asDate($data['TANGGAL_KELUAR'],'d MMMM Y');
                }
            ],
            'WAKTU_KELUAR',
            //'HARGA',
        ],
    ]) ?>

</div>
