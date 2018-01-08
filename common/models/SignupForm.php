<?php
namespace common\models;

use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $USERNAME;
    public $EMAIL;
    public $PASSWORD;
    public $NO_IDENTITAS;
    public $NAMA;
    public $JENIS_KELAMIN;
    public $ALAMAT;
    public $ROLE;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['USERNAME', 'trim'],
            ['USERNAME', 'required'],
            ['USERNAME', 'string', 'min' => 2, 'max' => 255],
            ['USERNAME', function($attribute, $params){ 
                $count = Yii::$app->db->createCommand('SELECT USERNAME FROM USERS WHERE USERNAME = :USERNAME') 
                ->bindValue(':USERNAME', $this->USERNAME) 
                ->queryScalar();
            if($count) 
                $this->addError($attribute, 'Username Telah Digunakan.');
            }],


            ['EMAIL', 'trim'],
            ['EMAIL', 'required'],
            ['EMAIL', 'email'],
            ['EMAIL', 'string', 'max' => 255],

            ['PASSWORD', 'required'],
            ['PASSWORD', 'string', 'min' => 6],

            [['NO_IDENTITAS','NAMA','JENIS_KELAMIN','ALAMAT','ROLE'], 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->USERNAME = $this->USERNAME;
        $user->EMAIL = $this->EMAIL;
        $user->setPassword($this->PASSWORD);
        $user->generateAuthKey();
        $user->NO_IDENTITAS = $this->NO_IDENTITAS;
        $user->NAMA = $this->NAMA;
        $user->JENIS_KELAMIN = $this->JENIS_KELAMIN;
        $user->ALAMAT = $this->ALAMAT;
        $user->ROLE = $this->ROLE;
        
        return $user->save() ? $user : null;
    }
}
