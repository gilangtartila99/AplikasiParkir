<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="site-signup">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <p>Masukkan data secara lengkap:</p>

    <div align="center" class="row thumbnail">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <div>
            <div class="col-lg-6">
                <?= $form->field($model, 'USERNAME')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'EMAIL') ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'PASSWORD')->passwordInput() ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'NO_IDENTITAS') ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'NAMA') ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'JENIS_KELAMIN')->dropdownList([
                    'Laki - Laki' => 'Laki - Laki', 
                    'Perempuan' => 'Perempuan',
                ],
                ['prompt'=>'Pilih Jenis Kelamin']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'ROLE')->dropdownList([
                    1 => 'Administrator', 
                    0 => 'Penjaga',
                ],
                ['prompt'=>'Pilih Hak Akses']) ?>
            </div>
            <div class="col-lg-12">
                <?= $form->field($model, 'ALAMAT')->textArea(['rows' => 5]) ?>
            </div>
            
            <div align="center" class="form-group col-lg-12">
                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

        </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>
