<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "HARGA".
 *
 * @property double $ID_HARGA
 * @property double $HARGA
 *
 * @property PARKIRKELUAR[] $pARKIRKELUARs
 */
class Harga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HARGA';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HARGA'], 'required'],
            [['HARGA'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_HARGA' => 'ID Harga',
            'HARGA' => 'Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkirkeluar()
    {
        return $this->hasMany(ParkirKeluar::className(), ['HARGA' => 'ID_HARGA']);
    }
}
