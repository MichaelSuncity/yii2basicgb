<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use app\models\Activity;
use yii\web\View;
use yii\helpers\Url;

/**
 * @var View $this
 * @var Activity $model
*/
?>

<h2><?=Html::encode($model['title'])?></h2>
<h2><?=Html::encode($model['description'])?></h2>
<ul>
    <li><strong>Пользователь: </strong><?= $model['userID']?></li>
    <li><strong>Повтор: </strong><?= $model['cycle']?></li>
    <li><strong>Блокирующее: </strong><?= $model['isBlocked']?></li>
    <li><strong>Начало: </strong><?= $model['dayStart']?></li>
    <li><strong>Окончание: </strong><?= $model['dayEnd']?></li>
</ul>

<p><?= Html::a('Редактировать событие', "/activity/edit?id={$model['id']}", ['class' => 'btn btn-success'] )  ?></p>

    <p><?= Html::a('Вернуться в мои события', Url::to(['/activity/index']) ) ?></p>
    <p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>
