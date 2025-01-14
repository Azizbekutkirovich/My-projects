<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property int $school
 * @property string $name
 * @property string $surname
 * @property int $class
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
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
            [['login', 'school', 'name', 'surname', 'class', 'password'], 'required'],
            [['school', 'class'], 'integer'],
            [['login', 'name', 'surname', 'password'], 'string', 'max' => 255],
            [['login', 'password'], 'unique', 'targetAttribute' => ['login', 'password']],
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
            'school' => 'School',
            'name' => 'Name',
            'surname' => 'Surname',
            'class' => 'Class',
            'password' => 'Password',
        ];
    }
}
