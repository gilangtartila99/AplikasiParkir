<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Sistem Parkir';
?>
<style type="text/css">
    .padding {
        padding: 20px;
        font-size: 40px;
    }
    .jarak {
        padding-top: 50px;
    }
</style>
<div class="site-index">

    <div class="jumbotron">
        <p><img src="images/logo.png" width="150px"></p>
        <font size="6">Selamat Datang</font>

        <p align="justify" class="lead"><font size="4" ><b>PT. Sentral Wahana Artha</b> adalah salah satu perusahaan Jasa berbadan hukum yang bergerak di bidang Outsourcing Facility Services, Security Services, Cleaning Services, Parking Management, dan Cash Management Service dengan didukung oleh tenaga profesional yang handal dan berpengalaman.</font></p>

    </div>

    <div class="body-content">

    <center>
        <div align="center" class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <?= Html::a('Masukkan Data Masuk Parkir', ['parkir/create', 'id' => 1], ['class' => 'btn-lg btn-primary padding']) ?>
          <?= Html::a('Masukkan Data Keluar Parkir', ['parkir-keluar/create'], ['class' => 'btn-lg btn-primary padding']) ?>
        </div>
    </center>

    </div>
</div>
