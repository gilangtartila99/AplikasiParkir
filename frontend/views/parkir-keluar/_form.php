<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ParkirKeluar */
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
<div align="center" class="parkir-keluar-form">

    <?php $form = ActiveForm::begin(['id' => 'my-form-id']); ?>

    <?php
	    $parkir = Html::getInputId($model, 'PARKIR_ID');
	?>

    <?= odaialali\qrcodereader\QrReader::widget([
        'id' => 'qrInput',
        'successCallback' => "function(data){ 
        	$('#my-form-id #{$parkir}').val(data);
        	$('#my-form-id #qrInput').val(data); 
        }"
    ]); ?>

    <div class="col-lg-4"><font size="10">No Parkir</font></div>
    <?= $form->field($model, 'PARKIR_ID')->textInput(['class' => 'form','readonly' => true])->label(false) ?>

    <?= $form->field($model, 'WAKTU_KELUAR')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Buat' : 'Update', ['class' => $model->isNewRecord ? 'btn-lg btn-primary padding' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
