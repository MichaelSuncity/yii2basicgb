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
    <h1><?= $model->title; ?> от <?= $model->dayStart; ?></h1>
    <h3>Дата начала события: <?= $model->dayStart; ?></h3>
    <h3>Дата окончания события: <?= $model->dayEnd; ?></h3>
    <h3>Пользователь: <?= $model->userID; ?></h3>
    <h3>Описание: </h3>
    <p><?= $model->description; ?></p>
    <p>Повтор: <?= $model->cycle; ?></p>
    <p>Блокирующее: <?= $model->isBlocked; ?></p>


<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

    <p><?= Html::submitButton('Редактировать событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>

<p><?= Html::a('Вернуться в мои события', Url::to(['/activity/index']) ) ?></p>

<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>
