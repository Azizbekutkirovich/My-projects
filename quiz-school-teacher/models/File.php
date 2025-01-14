<?php

namespace app\models;
use yii\base\Model;

class File extends Model
{
	public $file;
	public $test_name;
	public $class;
	public $time;

	public function rules() {
		return [
			[['file', 'test_name', 'class', 'time'], 'required', 'message' => "Maydonni to'ldirish shart!"]
		];
	}

	public function attributeLabels() {
		return [
			'time' => "Test ishlash uchun vaqtni minutda kiriting"
		];
	}
}