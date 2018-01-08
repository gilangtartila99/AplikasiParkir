<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "USERS".
 *
 * @property double $ID
 * @property string $USERNAME
 * @property string $AUTH_KEY
 * @property string $PASSWORD_HASH
 * @property string $PASSWORD_RESET_TOKEN
 * @property string $EMAIL
 * @property double $STATUS
 * @property double $CREATED_AT
 * @property double $UPDATED_AT
 * @property string $NO_IDENTITAS
 * @property string $NAMA
 * @property string $JENIS_KELAMIN
 * @property string $ALAMAT
 * @property double $ROLE
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USERS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERNAME', 'AUTH_KEY', 'PASSWORD_HASH', 'EMAIL', 'STATUS', 'CREATED_AT', 'UPDATED_AT'], 'required'],
            [['STATUS', 'CREATED_AT', 'UPDATED_AT', 'ROLE'], 'number'],
            [['USERNAME', 'PASSWORD_HASH', 'PASSWORD_RESET_TOKEN', 'EMAIL', 'NO_IDENTITAS', 'NAMA'], 'string', 'max' => 255],
            [['AUTH_KEY'], 'string', 'max' => 32],
            [['JENIS_KELAMIN'], 'string', 'max' => 50],
            [['ALAMAT'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USERNAME' => 'Username',
            'AUTH_KEY' => 'Auth Key',
            'PASSWORD_HASH' => 'Password Hash',
            'PASSWORD_RESET_TOKEN' => 'Password Reset Token',
            'EMAIL' => 'Email',
            'STATUS' => 'Status',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
            'NO_IDENTITAS' => 'No Identitas',
            'NAMA' => 'Nama',
            'JENIS_KELAMIN' => 'Jenis Kelamin',
            'ALAMAT' => 'Alamat',
            'ROLE' => 'Hak Akses',
        ];
    }
}
