<?php

use app\models\Meet;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мой кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div style="display: flex; flex-direction: row; justify-content: center" >
        <p>
            <?= Html::a('Мои встречи', ['/meet/index'], ['class' => 'btn btn-success']) ?>
        </p>&nbsp;
        <p>
            <?= Html::a('Организации', ['/organization/index'], ['class' => 'btn btn-success']) ?>
        </p>&nbsp;
    </div>


<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'title',
//            'description',
//            'date',
//            [
//                'label' => 'Компания',
//                'attribute' => 'organization_id',
//                'value' => function ($model) {
//                    return $model->organization ? $model->organization->name : '';
//                },
//            ],
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Meet $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
//        ],
//    ]); ?>


</div>
