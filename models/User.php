<?php

namespace app\models;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $email
 * @property int $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password_confirm;

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'email', 'password_confirm'], 'required'],
            ['email', 'email'],
            ['login', 'validateLogin'],
            ['password', 'compare', 'compareAttribute' => 'password_confirm'],
            [['login', 'password', 'name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password_confirm' => 'Подтверждение пароля',
            'password' => 'Пароль',
            'name' => 'Имя',
            'email' => 'Почта',
            'role' => 'Роль',
        ];
    }

    public function validatePassword($password) {
        return $this->password === md5($password);
    }

    static public function findByUsername($username) {
        return self::find()->where(['login'=>$username])->one();
    }

    public function validateLogin($attr)
    {
        $user = self::find()->where(['login'=>$this->login])->one();

        if ($user !== null) {
            $this->addError($attr, 'Incorrect username or password.');
        }
    }

    public function beforeSave($insert)
    {
        $this->password = md5($this->password);
        return true;
    }

    public function isAdmin()
    {
        return $this->role === 1;
    }
}
