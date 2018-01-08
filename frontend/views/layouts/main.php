<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<div class="col-lg-12"><img src="images/logo.png" width="20px"></div>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Halaman Utama', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Masuk', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            /*[
                'label' => 'Sistem Parkir',
                'items' => [
                    ['label' => 'Masukkan Data Masuk Parkir', 'url' => ['/parkir/create']],
                    ['label' => 'Masukkan Data Keluar Parkir', 'url' => ['/parkir-keluar/create']],
                ],
            ],*/
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->USERNAME . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>

        
        <p align="center" class="jarak">
            <p align="center"><font size="3"><b>PT. Sentral Wahana Artha</b></font></p>
            <p align="center"><font size="3">Alamat : Jl. Ajudan Jenderal No.1A, KPAD GegerKalong - Bandung 40153 Indonesia</font>
            <p align="center"><font size="3">Phone : (022) 2007324</font></p>
            <p align="center"><font size="3">Fax : (022) 2016386</font></p>
            <p align="center"><font size="3">Email : info@sentralwahana-artha.com</font></p>
        </p>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Sistem Parkir <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
