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


<?php foreach ($activities as $item) { ?>
   <div>
        <h3><a href="/activity/view?id=<?=$item->id ?>">Название: <?= $item->title ?></a></h3>
        <p>Описание события: <?= $item->description ?></p>
        <p>Дата начала: <?= $item->dayStart ?></p>
        <p>Дата окончания: <?= $item->dayEnd ?></p>
   </div>
<?php } ?>



<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

<p><?= Html::submitButton('Добавить событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>


<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>

