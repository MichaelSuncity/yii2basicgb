<?php


namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionIndex() {
    return Yii::$app->session->get('page', 'NOT SET');
    /**
       * $url = Yii::$app->request->url;
       * Yii::$app->session->set('lastPage', $url);
       * var_dump(Yii::$app->session->get('lastPage'));
    */
    }

    public function actionView() {
        $activityItem = new Activity();
        $activityItem->title = 'New Activity Heading';
        return $this->render('view', [
            'model'  => $activityItem
        ]);
    }

    public function actionArrayHelper() {
        $arr = [
            [
                'id' => 1,
                'login' => 'admin',
                'salary'=> 10000
            ],
            [
                'id' => 2,
                'login' => 'manager',
                'salary' => 1000
            ],
            [
                'id' => 3,
                'login' => 'employee',
                'salary' => 1000
            ],
        ];
        $logins = ArrayHelper::getColumn($arr, 'login');
        //var_dump($logins);
    }
}