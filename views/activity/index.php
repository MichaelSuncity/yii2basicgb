<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


?>

<h1>Список событий</h1>

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


<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>

