<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Questions;
use app\models\UserDt;
use app\excel\SimpleXLSX;

class TeacherController extends Controller
{
	public function beforeAction($action) {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/index']);
		}
		return parent::beforeAction($action);
	}

	public function actionInfo() {
		$info = Questions::findOne(['id' => Yii::$app->request->get("id")]);
		if (empty($info) || $info->teach_id !== Yii::$app->user->identity->id) {
			return $this->goBack();
		}
		return $this->render("info", compact("info"));
	}

	public function actionSelect() {
		$info = Questions::find()
			->asArray()
			->where(['teach_id' => Yii::$app->user->identity->id])
			->all();
		return $this->render("select", compact("info"));
	}

	public function actionView() {
		if (empty(Yii::$app->request->get("question_id")) || empty(Yii::$app->request->get("test_name"))) {
			return $this->goBack();
		}
		$users_info = UserDt::find()
			->asArray()
			->where(['question_id' => Yii::$app->request->get("question_id")])
			->all();
		return $this->render("view", [
			'users_info' => $users_info,
			'test_name' => Yii::$app->request->get("test_name")
		]);
	}

	public function actionDetail() {
		$info = UserDt::findOne([
			'id' => Yii::$app->request->get("id")
		]);
		if (empty($info)) {
			return $this->goBack();
		}
		$question = Questions::findOne(['id' => $info->question_id]);
		$src = "./../../quiz-school/web/tests/".$question->name;
		$excel = SimpleXLSX::parse($src);
		$rows = $excel->rows();
		$start = 0;
		for ($i = 0; $i < count($rows); $i++) {
			if ($rows[$i][0] == 'T/r' || $rows[$i][0] == '№' || $rows[$i][0] == 'TP') {
				$start = $i + 1;
			}
		}
		$test_name = $question->test_name;
		return $this->render("detail", [
			'info' => $info,
			'test_name' => $test_name,
			'rows' => $rows,
			'start' => $start 
		]);
	}

	public function actionSelectview() {
		$question = Questions::find()
			->asArray()
			->where(['teach_id' => Yii::$app->user->identity->id])
			->all();
		return $this->render("selectview", compact("question"));
	}
}