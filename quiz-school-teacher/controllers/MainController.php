<?php
namespace app\controllers;

use Yii;
use app\models\LoginForm;
use app\models\Signup;
use yii\web\Controller;

class MainController extends Controller
{
	public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['main/login']);
        }
		return $this->render("index");
	}

	public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = "login";
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = "login";
        $model = new Signup();

        if ($model->load(Yii::$app->request->post())) {
            if (strlen($model->name) < 3) {
                Yii::$app->session->setFlash("error", "Ismingiz kamida 3ta harfdan iborat bo'lishi lozim!");
                return $this->redirect(['main/register']);
            }
            if (strlen($model->surname) < 5) {
                Yii::$app->session->setFlash("error", "Familyangiz kamida 5ta harfdan iborat bo'lishi lozim!");
                return $this->redirect(['main/register']);
            }
            if (strlen((string)$model->password) < 4) {
                Yii::$app->session->setFlash("error", "Parol kamida 4ta belgidan iborat bo'lishi kerak!");
                return $this->redirect(['main/register']);
            }
            if ($model->secret != "platforma_va_test") {
                Yii::$app->session->setFlash("error", "Maxfiy parolni noto'g'ri kiritdingiz!");
                return $this->redirect(['main/register']);
            }
            if ($model->signup()) {
                $login = new LoginForm();
                $login->login = $model->login;
                $login->password = $model->password;
                if ($login->login()) {
                    return $this->redirect(['main/index']);
                }
            }
        }

        return $this->render("register", compact("model"));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionError() {
        $this->layout = 'error';
        $error = Yii::$app->response->statusCode;
        if ($error === 404) {
            return $this->render('error404');
        }
    }
}