<?php

use app\models\Activity;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

/**
 * @var $this yii\web\View
 * @var \app\models\Activity[] $activities
 * @var $provider \yii\data\ActiveDataProvider
 *
 */
/*
<?php foreach ($activities as $item) { ?>
   <div>
        <h3><a href="/activity/view?id=<?=$item->id ?>">Название: <?= $item->title ?></a></h3>
        <p>Описание события: <?= $item->description ?></p>
        <p>Дата начала: <?= $item->dayStart ?></p>
        <p>Дата окончания: <?= $item->dayEnd ?></p>
        <p>Пользователь: <?= $item->userID ?></p>
   </div>
<?php } ?>
*/

$columns = [
    [
        'class' => SerialColumn::class,
        'header' => 'Псевдо-порядковый класс',
    ],
    [
        'label' => 'Порядковый номер',
        'attribute' => 'id',
    ],
    'title',
    'dayStart:datetime',
    'dayEnd:datetime',
    [
        'label' => 'Имя создателя',
        'attribute' => 'userID',
        'value' => function (Activity $model){
            return $model->user->username;
        }
    ],
    'isBlocked:boolean',
    'cycle:boolean',
];

if (Yii::$app->user->can('user')){
    $columns[]=[
        'class' => ActionColumn::class,
        'header' => 'Операции',
        'template' => '{view} {update} {delete} {edit}',
        'buttons' => [
          'edit' => function ($url, $model, $key){
            return html::a('Custom', $url);
          }
        ],
    ];
}

?>

<h1>Список событий</h1>



<?= GridView::widget([
        'dataProvider' => $provider,
        'columns'=> $columns,
])?>




<?php $form = ActiveForm::begin([
    'action' => '/activity/create',
])?>

<p><?= Html::submitButton('Добавить событие', ['class' => 'btn btn-success']) ?></p>

<?php ActiveForm::end()?>


<p><?= Html::a('Вернуться в календарь', Url::to(['/calendar']) ) ?></p>

