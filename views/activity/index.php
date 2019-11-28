<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;


?>

<h1>Мои события</h1>

<?php $form = ActiveForm::begin([
    'action' => '/activity/view',
])?>

    <p><?= Html::submitButton('Событие № 1', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>


<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

<p><?= Html::submitButton('Добавить событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>

<?php $form = ActiveForm::begin([
    'action' => '/calendar',
])?>

    <p><?= Html::submitButton('Вернуться в календарь', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>