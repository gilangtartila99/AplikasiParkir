<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USERNAME')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_IDENTITAS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JENIS_KELAMIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ROLE')->dropdownList([
        1 => 'Administrator', 
        0 => 'Penjaga',
    ],['prompt'=>'Pilih Role']) ?>

    <?= $form->field($model, 'STATUS')->dropdownList([
        10 => 'Aktif', 
        0 => 'Tidak Aktif',
    ],['prompt'=>'Pilih Role']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Buat' : 'Edit', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
