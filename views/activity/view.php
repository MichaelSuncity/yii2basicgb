<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use app\models\Activity;
use yii\web\View;
/**
 * @var View $this
 * @var Activity $model
*/
?>
    <h1><?= $model->title; ?> от <?= $model->dayStart; ?></h1>
    <h3>Дата начала события: <?= $model->dayStart; ?></h3>
    <h3>Дата окончания события: <?= $model->dayEnd; ?></h3>
    <h3>Описание: </h3>
    <p><?= $model->description; ?></p>


<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

    <p><?= Html::submitButton('Редактировать событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>

<?php $form = ActiveForm::begin([
    'action' => '/activity/index',
])?>

    <p><?= Html::submitButton('Вернуться в мои события ', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>


<?php $form = ActiveForm::begin([
    'action' => '/calendar',
])?>

    <p><?= Html::submitButton('Вернуться в календарь', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>