<?php

use app\models\Meet;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Meets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Назначить встречу', ['/meet/create'], ['class' => 'btn btn-success']) ?>
    </p>&nbsp;


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description',
            'date',
            [
                'label' => 'Компания',
                'attribute' => 'organization_id',
                'value' => function ($model) {
                    return $model->organization ? $model->organization->name : '';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Meet $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
