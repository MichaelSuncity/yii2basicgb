<?php


namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;

        $adminRole = $auth->createRole('admin');
        $adminRole->description = 'Super admin';
        $auth->add($adminRole);

        $auth->assign($adminRole, 1);
    }
}