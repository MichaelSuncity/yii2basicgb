<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\UpdateUserForm $model
 * @var \yii\data\ActiveDataProvider $provider
 */


?>


<h1>Мой профиль</h1>
<div class="user-form">
    <?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'username')->textInput(['autofocus'=>true])?>
    <?= $form->field($model, 'password')->passwordInput()?>
    <?=$form->field($model, 'repeatPassword')->passwordInput()?>
    <div class="form-group">
        <?= Html::submitButton('Применить', ['class'=>'btn btn-success'])?>
    </div>
    <?php ActiveForm::end();?>
</div>

<?= $this->render('/activity/index', compact('provider'))?>