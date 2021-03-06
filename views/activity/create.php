<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use app\models\Activity;
use yii\web\View;
use yii\helpers\Url;

/**
 * @var  View $this
 * @var  Activity $model
 */
// $form->field($model, 'attachments[]')->fileInput(['multiple' => true])
//<?= $form->field($model, 'userID')->textInput(['autocomplete' => 'off']) 
?>

<h1>Создать событие</h1>
<?php $form = ActiveForm::begin([
    'action' => '/activity/submit',
])?>

<?= $form->field($model, 'title')->textInput(['autocomplete' => 'off']) ?>
<?= $form->field($model, 'dayStart')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'dayEnd')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
<?= $form->field($model, 'cycle')->checkbox() ?>
<?= $form->field($model, 'isBlocked')->checkbox() ?>

<p><?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>

<p><?= Html::a('Вернуться в мои события', Url::to(['/activity/index']) ) ?></p>

