<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

class Teachers extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'name', 'surname', 'phone', 'school', 'job', 'password'], 'required', 'message' => "Maydonni to'ldirishv shart!"],
            [['school'], 'integer'],
            [['login', 'name', 'surname', 'phone', 'job', 'password'], 'string', 'max' => 255],
            [['login', 'phone', 'password'], 'unique', 'targetAttribute' => ['login', 'phone', 'password']],
            [['login'], 'unique', 'message' => 'Bu login band!'],
            [['phone'], 'unique', 'message' => "Bu telefon raqamdan allaqachon ro'yhatdan o'tilgan!"],
            [['password'], 'unique', 'message' => "Bu parol band! Boshqa parol kiriting!"]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'school' => 'School',
            'job' => 'Job',
            'password' => 'Password',
        ];
    }

    public function create() {
        return $this->save();
    }

    public static function findIdentity($id)
    {
        return self::findone(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return self::findone(['login' => $login]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
