<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ParkirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistem Parkir';
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="parkir-index thumbnail">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= odaialali\qrcodereader\QrReader::widget([
        'id' => 'qrInput',
        'successCallback' => "function(data){ $('#qrInput').val(data) }"
    ]); ?>
</div>