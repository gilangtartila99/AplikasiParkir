<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="center">
        <?= Html::a('Buat Pengguna', ['site/signup'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'ID',
            'USERNAME',
            'EMAIL:email',
            // 'STATUS',
            'NO_IDENTITAS',
            'NAMA',
            'JENIS_KELAMIN',
            'ALAMAT',
            [
                'label' => 'Hak Akses',
                'value' => function($data) {
                    if($data->ROLE==1){
                        return 'Administrator';
                    } else {
                        return 'Penjaga';
                    }
                }
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
