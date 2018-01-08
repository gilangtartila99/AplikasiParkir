<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PARKIR".
 *
 * @property double $ID_PARKIR
 * @property string $TANGGAL_PARKIR
 * @property string $BULAN_PARKIR
 * @property string $TAHUN_PARKIR
 * @property string $PLAT_NOMOR
 */
class Parkir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PARKIR';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TANGGAL_PARKIR'], 'string'],
            [['HARI_PARKIR','BULAN_PARKIR', 'TAHUN_PARKIR', 'PLAT_NOMOR','WAKTU_MASUK'], 'required'],
            [['BULAN_PARKIR', 'TAHUN_PARKIR', 'PLAT_NOMOR'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PARKIR' => 'No Parkir',
            'TANGGAL_PARKIR' => 'Tanggal Parkir',
            'HARI_PARKIR' => 'Hari Parkir',
            'BULAN_PARKIR' => 'Bulan Parkir',
            'TAHUN_PARKIR' => 'Tahun Parkir',
            'PLAT_NOMOR' => 'Plat Nomor',
            'WAKTU_MASUK' => 'Waktu Masuk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkirkeluar()
    {
        return $this->hasMany(ParkirKeluar::className(), ['PARKIR_ID' => 'ID_PARKIR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkirkeluars()
    {
        return $this->hasOne(ParkirKeluar::className(), ['PARKIR_ID' => 'ID_PARKIR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHarga()
    {
        return $this->hasOne(Harga::className(), ['ID_HARGA' => 'HARGA']);
    }
}
