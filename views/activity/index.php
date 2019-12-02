<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/**
 * @var array $activities;
 */

?>

<h1>Список событий</h1>

<ul>
<?php foreach ($activities as $item) { ?>
    <li>
        <?=Html::a('Событие: ' . "{$item['title']}", Url::to(["/activity/view?id={$item['id']}"]))?>
    </li>
<?php } ?>
</ul>


<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

<p><?= Html::submitButton('Добавить событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>


<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>

