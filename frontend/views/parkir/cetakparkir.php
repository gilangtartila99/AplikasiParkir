<?php
use yii\helpers\Html;
?>
<div align="center">
<?php
//var_dump($dataProvider);

$total=0;
foreach ($models as $x) {
    $id = $x->ID_PARKIR;
    $tanggal = $x->TANGGAL_PARKIR;
    $plat_nomor = $x->PLAT_NOMOR;
    $waktu = $x->WAKTU_MASUK;
}
?>

<?= \PHPQRCode\QRcode::png($model->ID_PARKIR, "qrcode/".$model->ID_PARKIR.".png", 'L', 4, 2); ?>
      <div align="center"><?= Html::img(Yii::getAlias('@imgfrontend')."/".$model['ID_PARKIR'].".png", ['width' => '80px']); ?></div>

<b><p align="center"><font size="1">No Parkir : <i><b><?= $id ?></b></i></font></p></b>
<p align="center"><font size="1"><b><?= $plat_nomor ?></b></font></p>
<font size="1"><?= Yii::$app->formatter->asDate($tanggal, 'dd MMMM Y') ?></font>
<font size="1"><?= $waktu ?></font>
<p></p>
</div>

