<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PARKIR_KELUAR".
 *
 * @property double $ID_PARKIR_KELUAR
 * @property double $PARKIR_ID
 * @property double $WAKTU_KELUAR
 * @property double $HARGA
 */
class ParkirKeluar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PARKIR_KELUAR';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARKIR_ID','WAKTU_KELUAR', 'TANGGAL_KELUAR','WAKTU_KELUAR'], 'required'],

            /*[['PARKIR_ID'], function($attribute, $params){
                $count = Yii::$app->db->createCommand('SELECT PARKIR_KELUAR.PARKIR_ID FROM PARKIR.PARKIR_KELUAR INNER JOIN PARKIR.PARKIR ON :PARKIR_ID = PARKIR.ID_PARKIR')
                    ->bindValue(':PARKIR_ID', $this->PARKIR_ID)
                    ->queryScalar();
                if($count) {
                    return true;
                } else {
                    Yii::$app->session->setFlash('danger','Data Tidak Valid!');
                    $this->addError($attribute, 'Data Tidak Valid!.');
                }
            }],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PARKIR_KELUAR' => 'No Parkir Keluar',
            'PARKIR_ID' => 'No Parkir',
            'WAKTU_KELUAR' => 'Waktu Keluar',
            'TANGGAL_KELUAR' => 'Tanggal Keluar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkir()
    {
        return $this->hasMany(Parkir::className(), ['ID_PARKIR' => 'PARKIR_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkirs()
    {
        return $this->hasOne(Parkir::className(), ['ID_PARKIR' => 'PARKIR_ID']);
    }
}
