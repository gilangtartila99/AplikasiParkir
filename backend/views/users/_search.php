<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'USERNAME') ?>

    <?= $form->field($model, 'AUTH_KEY') ?>

    <?= $form->field($model, 'PASSWORD_HASH') ?>

    <?= $form->field($model, 'PASSWORD_RESET_TOKEN') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'CREATED_AT') ?>

    <?php // echo $form->field($model, 'UPDATED_AT') ?>

    <?php // echo $form->field($model, 'NO_IDENTITAS') ?>

    <?php // echo $form->field($model, 'NAMA') ?>

    <?php // echo $form->field($model, 'JENIS_KELAMIN') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'ROLE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
