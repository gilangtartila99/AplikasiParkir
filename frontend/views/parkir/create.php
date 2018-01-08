<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Parkir */

$this->title = 'Sistem Parkir';
$this->params['breadcrumbs'][] = ['label' => 'Sistem Parkir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="parkir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
