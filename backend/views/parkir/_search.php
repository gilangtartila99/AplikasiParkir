<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\ParkirSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div align="center" class="parkir-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-lg-4">
    <?= $form->field($model, 'HARI_PARKIR')->dropdownList([
        '01' => 01, 
        '02' => 02,
        '03' => 03, 
        '04' => 04,
        '05' => 05, 
        '06' => 06,
        '07' => 07, 
        '08' => 08,
        '09' => 09, 
        '10' => 10,
        '11' => 11, 
        '12' => 12,
        '13' => 13, 
        '14' => 14,
        '15' => 15, 
        '16' => 16,
        '17' => 17, 
        '18' => 18,
        '19' => 19, 
        '20' => 20,
        '21' => 21, 
        '22' => 22,
        '23' => 23, 
        '24' => 24, 
        '25' => 25,
        '26' => 26, 
        '27' => 27,
        '28' => 28, 
        '29' => 29,
        '30' => 30, 
        '31' => 31,
    ],
    ['prompt'=>'Pilih Hari'])->label('Hari') ?>
    </div>

    <div class="col-lg-4">
    <?= $form->field($model, 'BULAN_PARKIR')->dropdownList([
        '01' => 'Januari', 
        '02' => 'Februari',
        '03' => 'Maret', 
        '04' => 'April',
        '05' => 'Mei', 
        '06' => 'Juni',
        '07' => 'Juli', 
        '08' => 'Agustus',
        '09' => 'September', 
        '10' => 'Oktober',
        '11' => 'November', 
        '12' => 'Desember',
    ],
    ['prompt'=>'Pilih Bulan'])->label('Bulan') ?>
    </div>

    <div class="col-lg-4">
    <?= $form->field($model, 'TAHUN_PARKIR')->dropdownList([
        '2015' => 2015, 
        '2016' => 2016,
        '2017' => 2017, 
        '2018' => 2018,
        '2019' => 2019, 
        '2020' => 2020,
        '2021' => 2021, 
        '2022' => 2022,
        '2023' => 2023, 
        '2024' => 2024, 
        '2025' => 2025,
        '2026' => 2026, 
        '2027' => 2027,
        '2028' => 2028, 
        '2029' => 2029,
        '2030' => 2030, 
        '2031' => 2031,
        '2032' => 2032, 
        '2033' => 2033,
        '2034' => 2034, 
        '2035' => 2035,
        '2036' => 2036, 
        '2037' => 2037,
        '2038' => 2038, 
        '2039' => 2039,
        '2040' => 2040, 
        '2041' => 2041, 
        '2042' => 2042,
        '2043' => 2043, 
        '2044' => 2044,
        '2045' => 2045, 
        '2046' => 2046,
        '2047' => 2047, 
        '2048' => 2048,
    ],
    ['prompt'=>'Pilih Tahun'])->label('Tahun') ?>
    </div>
    </div>

    <p>
    <div align="center" class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cetak Laporan Harian', ['cetakharian','hari' => $model->HARI_PARKIR], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Cetak Laporan Bulanan', ['cetakbulanan','bulan' => $model->BULAN_PARKIR], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Cetak Laporan Tahunan', ['cetaktahunan','tahun' => $model->TAHUN_PARKIR], ['class' => 'btn btn-default']) ?>
    </div>
    </p>

    <?php ActiveForm::end(); ?>

</div>
