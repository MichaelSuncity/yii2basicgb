<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

?>
<h1>Календарь</h1>

<?php $form = ActiveForm::begin([
    'action' => '/activity/index',
])?>

<p><?= Html::submitButton('Просмотреть мои события', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>
