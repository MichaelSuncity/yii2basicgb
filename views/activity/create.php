<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use app\models\Activity;
use yii\web\View;
/**
 * @var  View $this
 * @var  Activity $model
 */

?>

<h1>Создать/отредактировать событие</h1>
<?php $form = ActiveForm::begin([
    'action' => '/activity/submit',
])?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'dayStart')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'dayEnd')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
<?= $form->field($model, 'cycle')->checkbox() ?>
<?= $form->field($model, 'isBlocked')->checkbox() ?>

    <p><?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>

<?php $form = ActiveForm::begin([
    'action' => '/activity/index',
])?>

<p><?= Html::submitButton('Вернуться в мои события ', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>
