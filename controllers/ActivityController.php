<?php


namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class, //ACF
                //'only' => ['index', 'view', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'submit'],
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }

    public function actionIndex($sort = false) {
    /**
       * $url = Yii::$app->request->url;
       * Yii::$app->session->set('lastPage', $url);
       * var_dump(Yii::$app->session->get('lastPage'));
    */
    /*if (Yii::$app->user->isGuest){
        return '403 - no no no';
    }*/


    /*$db = Yii::$app->db;

    $rows= $db->createCommand('select * from activities')->queryAll();*/
    /*$query = new Query();
    $query
        ->select('*')
        ->from('activities');
    */
    /*$query = Activity::find();

    if($sort) {
        $query->orderBy("id desc");
    }

    $rows = $query->all();
    */
    $query = Activity::find();

    if (!Yii::$app->user->can('admin')){
        $query->andWhere(['userID'=>Yii::$app->user->id]);
    }


    $provider = new ActiveDataProvider([
       'query' => $query,
        'pagination' => [
            'validatePage' => false,
            'pageSize' => 5,
        ]
    ]);

    return $this->render('index', [
        'provider' => $provider
    ]);
    }

    public function actionView(int $id) {
       /*$model = new Activity([
           'title'  => 'Событие № 1',
           'dayStart' => '28.11.2019 г.',
           'dayEnd' => '28.11.2019 г.',
           'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, aspernatur assumenda at et eveniet exercitationem explicabo facere facilis fugiat hic ipsum iusto labore laudantium neque nisi odio perspiciatis quae qui quibusdam quod rem rerum sit tempore tenetur vel? Facilis magni natus neque porro quaerat quo, recusandae. Amet commodi, consequuntur deleniti deserunt doloribus facilis fuga fugit id ipsam itaque labore magni maiores, nam natus nisi officiis, optio praesentium quam qui quis ratione rem tempora tenetur. Accusamus dignissimos dolore, facere facilis fugit incidunt inventore laudantium mollitia, nam natus nemo officia provident, saepe sunt veniam? Aperiam ipsa minus obcaecati similique. Dolorum, esse, saepe!',
           'isBlocked' => true,
           'cycle' => false,
           'userID' => 1,
       ]);*/

       /*$db =Yii::$app->db;

       $model = $db->createCommand('select * from activities where id=:id', [
           ':id' => $id,
       ])->queryOne();*/
        $cacheKey = "activity_{$id}";
        if(Yii::$app->cache->exists($cacheKey)){
            $model = Yii::$app->cache->get($cacheKey);
        } else {
            $model = Activity::findOne($id);
            Yii::$app->cache->set($cacheKey, $model);
        }

        return $this->render('view',
            compact('model'));
    }

    public function actionCreate(){
        $model = new Activity();
        return $this->render('create',
          ['model' => $model]
        );
     }

    public function actionUpdate(int $id = null)
    {
        if(!empty($id)){
            $model = Activity::findOne($id);
            if($model->load(Yii::$app->request->post()) and $model->validate()){
                if($model->save()) {
                    return $this->redirect(["activity/view?id=$model->id"]);
                }
            }
            return $this->render('edit', [
                'model' => $model
            ]);
        }
    }

    public function actionSubmit() {
        $model = new Activity();
        if($model->load(Yii::$app->request->post())) {
            //$model->attachments = UploadedFile::getInstance($model, 'attachments');
            if ($model->validate()) {
                $model->save();
                //$query = new QueryBuilder(Yii::$app->db);
                //$params = [];
                //echo $query->insert('activities', $model->attributes, $params);
                return 'Success: ' . VarDumper::export($model->attributes);
            } else {
                return 'Failed: ' . VarDumper::export($model->errors);
            }
        }
        return 'Activity@Submit';
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