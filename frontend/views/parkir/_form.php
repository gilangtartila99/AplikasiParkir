<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Parkir */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    .padding {
        padding: 10px;
        font-size: 20px;
        width: 100px;
    }
    .form {
        width: 750px;
        font-size: 40px;
    }
</style>
<div align="center" class="parkir-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TANGGAL_PARKIR')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'BULAN_PARKIR')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'TAHUN_PARKIR')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'WAKTU_MASUK')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'HARGA')->hiddenInput()->label(false) ?>

    <div class="col-lg-4"><font size="10">Plat Nomor</font></div>
    <?= $form->field($model, 'PLAT_NOMOR')->textInput(['class' => 'form'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Buat' : 'Update', ['class' => $model->isNewRecord ? 'btn-lg btn-primary padding' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
