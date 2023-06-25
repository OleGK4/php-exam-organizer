<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Meet $model */

$this->title = 'Назначить встречу';
?>
<div class="meet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
