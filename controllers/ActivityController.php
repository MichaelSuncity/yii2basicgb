<?php


namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionIndex() {
    /**
       * $url = Yii::$app->request->url;
       * Yii::$app->session->set('lastPage', $url);
       * var_dump(Yii::$app->session->get('lastPage'));
    */
    return $this->render('index');
    }

    public function actionView() {
       $model = new Activity([
           'title'  => 'Событие № 1',
           'dayStart' => '28.11.2019 г.',
           'dayEnd' => '28.11.2019 г.',
           'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, aspernatur assumenda at et eveniet exercitationem explicabo facere facilis fugiat hic ipsum iusto labore laudantium neque nisi odio perspiciatis quae qui quibusdam quod rem rerum sit tempore tenetur vel? Facilis magni natus neque porro quaerat quo, recusandae. Amet commodi, consequuntur deleniti deserunt doloribus facilis fuga fugit id ipsam itaque labore magni maiores, nam natus nisi officiis, optio praesentium quam qui quis ratione rem tempora tenetur. Accusamus dignissimos dolore, facere facilis fugit incidunt inventore laudantium mollitia, nam natus nemo officia provident, saepe sunt veniam? Aperiam ipsa minus obcaecati similique. Dolorum, esse, saepe!',
       ]);
        return $this->render('view',
            compact('model'));
    }

    public function actionCreate(){
        $model = new Activity();
        return $this->render('create',
          ['model' => $model]
        );
     }

    public function actionSubmit() {
        $model = new Activity();
        $model->load(Yii::$app->request->post());

        if ($model->validate()){
            return $this->redirect(['/activity/result']);
        } else {
            return $this->redirect(['/activity/create']);
        }
    }

    public function actionResult() {
        return 'Thanks';
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