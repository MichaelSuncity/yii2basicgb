<?php

namespace app\modules\first\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `first` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->seo->registerTitle('New value');
        return $this->render('index');
    }
}
