<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sistem Parkir';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .login {
        width: 500px;
    }
    .color {
        background: #DCDCDC;
    }
</style>
<?= linchpinstudios\backstretch\Backstrech::widget([
                  // 'duration' => 2000,
                  //  'fade' => 750,
                    'clickEvent' => false,                    
                    'images' => [
                      ['image' => 'http://dl.dropbox.com/u/515046/www/outside.jpg'],
                      ['image' => 'http://dl.dropbox.com/u/515046/www/garfield-interior.jpg'],
                      ['image' => 'http://dl.dropbox.com/u/515046/www/cheers.jpg'],
                    ],
                  ]);
                ?>
<div align="center" class="site-login thumbnail color">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Silahkan masukkan username dan password sebagai administrator:</p>

    <div align="center" class="row login">
        <div align="center">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'USERNAME')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'PASSWORD')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
