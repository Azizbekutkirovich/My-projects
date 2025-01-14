<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\File;
use app\models\Tests;
use app\models\Test;
use app\models\Teachers;
use app\models\Questions;
use yii\web\UploadedFile;
use app\excel\SimpleXLSX;

class TestController extends Controller
{

	public function actionUpload() {
		if (Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		$model = new File();
		if ($model->load(Yii::$app->request->post())) {
			$excel = SimpleXLSX::parse($_FILES['File']['tmp_name']['file']);
			$rows = $excel->rows();
			$start = 0;
			for ($i = 0; $i < count($rows); $i++) {
				if ($rows[$i][0] === '№') {
					$start = $i + 1;
				}
			}
			if ($start === 0) {
				$empty_nomericon_error = 1;
				return $this->render("error", compact('empty_nomericon_error'));
			}
			$question_count = count($rows) - $start;
			for ($i = 1; $i <= $question_count; $i++) {
				$row_question_num = $start + $i - 1;
				if ($rows[$row_question_num][0] !== $i) {
					$question_number_error = $rows[$row_question_num][0];
					$question_number_true = $i;
					return $this->render("error", [
						'question_number_error' => $question_number_error,
						'question_number_true' => $question_number_true
					]);
				}
			}
			for ($i = $start; $i < count($rows); $i++) {
				$ans = (string) $rows[$i][2];
				if ($ans !== 'A' && $ans !== 'B' && $ans !== 'C' && $ans !== 'D') {
					$ans_number_error = $rows[$i][0];
					$ans_error = $rows[$i][2];
					return $this->render("error", [
						'ans_number_error' => $ans_number_error,
						'ans_error' => $ans_error
					]);
				}
			}
			$teacher_info = Teachers::findOne(['id' => Yii::$app->user->identity->id]);
			$questions = new Questions();
			$questions->school = $teacher_info->school;
			$questions->job = $teacher_info->job;
			$questions->class = $model->class;
			$questions->teach_id = Yii::$app->user->identity->id;
			$questions->test_name = $model->test_name;
			$questions->time = $model->time;
			$file = UploadedFile::getInstance($model, 'file');
			$name = "test".time();
			$questions->name = $name.'.'.$file->extension;
			if ($questions->save() && $file->saveAs('./../../quiz-school/web/tests/'.$name.'.'.$file->extension)) {
				return $this->render("success");
			}
			// $excel = SimpleXLSX::parse($_FILES['File']['tmp_name']['file']);
			// $rows = $excel->rows();
			// $info = Tests::find()
			// 	->asArray()
			// 	->all();
			// if (!empty($info)) {

			// } else {
			// 	$teacher_info = Teachers::findOne(['id' => Yii::$app->user->identity->id]);
			// 	$tests = new Tests();
			// 	$tests->test_id = 1;
			// 	$tests->school = $teacher_info->school;
			// 	$tests->job = $teacher_info->job;
			// 	$tests->class = $teacher_info->class;
			// 	$tests->teach_id = Yii::$app->user->identity->id;
			// 	if ($tests->save()) {
			// 		foreach ($rows as $r) {
			// 			$test = new Test();
			// 			$test->tests_id = $tests->test_id;
			// 			$test->question = $r[1];
			// 			$test->a = $r[3];
			// 			$test->b = $r[4];
			// 			$test->c = $r[5];
			// 			$test->d = $r[6];
			// 			$test->correct = $r[7];
			// 			if ($test->save()) {
			// 				return $this->render("success");
			// 			}
			// 		}
			// 	}
			// }
		}
		return $this->render("upload", compact("model"));
	}

	public function actionHowupload() {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/login']);
		}
		return $this->render("howupload");
	}
}