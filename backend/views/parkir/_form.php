<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Parkir */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parkir-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TANGGAL_PARKIR')->textInput() ?>

    <?= $form->field($model, 'BULAN_PARKIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TAHUN_PARKIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WAKTU_MASUK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PLAT_NOMOR')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
