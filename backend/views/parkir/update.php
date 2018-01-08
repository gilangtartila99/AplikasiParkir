<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Parkir */

$this->title = 'Edit Data Parkir: ' . $model->PLAT_NOMOR;
$this->params['breadcrumbs'][] = ['label' => 'Parkirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PLAT_NOMOR, 'url' => ['view', 'id' => $model->ID_PARKIR]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="parkir-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
