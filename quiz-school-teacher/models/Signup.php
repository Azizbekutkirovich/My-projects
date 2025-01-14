<?php

namespace app\models;
use yii\base\Model;

class Signup extends Model
{
	public $login;
	public $name;
	public $surname;
	public $phone;
	public $school;
	public $job;
	public $password;
	public $secret;

	public function rules()
    {
        return [
            [['login', 'name', 'surname', 'phone', 'school', 'job', 'password', 'secret'], 'required', 'message' => "Maydonni to'ldirish shart"],
            [['school'], 'integer'],
            [['login', 'name', 'surname', 'phone', 'job', 'password'], 'string', 'max' => 255],
            ['login', 'unique', 'targetClass' => '\app\models\Teachers', 'message' => 'Bu login band!'],
            ['phone', 'unique', 'targetClass' => '\app\models\Teachers', 'message' => "Bu telefon raqamdan allaqachon ro'yhatdan o'tilgan!"],
            ['password', 'unique', 'targetClass' => '\app\models\Teachers', 'message' => "Bu parol band! Boshqa parol kiriting!"]
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

    protected function save() {
        if ($this->validate()) {
            $user = new Teachers();
            $user->login = $this->login;
            $user->name = $this->name;
            $user->surname = $this->surname;
            $user->phone = $this->phone;
            $user->school = $this->school;
            $user->job = $this->job;
            $user->password = $this->password;
            return $user->create();
        }
    }

    public function signup() {
    	return $this->save();
    }
}