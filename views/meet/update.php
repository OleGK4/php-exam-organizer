<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Meet $model */

$this->title = 'Update Meet: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Meets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
