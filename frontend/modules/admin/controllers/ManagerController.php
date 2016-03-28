<?php

namespace frontend\modules\admin\controllers;

use frontend\modules\admin\models\LoginForm;
use Yii;
use yii\web\Controller;

/**
 * 后台管理员控制器
 * Class ManagerController
 * @package frontend\modules\admin\controllers
 */
class ManagerController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
            return $this->redirect('index');
        } else {
            return $this->render('login', [
                'model' => $model
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}