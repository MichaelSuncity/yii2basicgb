<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var \app\models\Activity[] $activities
 */

?>

<h1>Список событий</h1>

<ul>
<?php foreach ($activities as $item) { ?>
    <li>
        <?= var_dump($item->user->username);?>
    </li>
<?php } ?>
</ul>


<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

<p><?= Html::submitButton('Добавить событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>


<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>

