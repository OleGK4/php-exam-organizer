<?php

use app\models\Organization;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$items = Organization::find()
    ->select(['name'])
    ->indexBy('id')
    ->column();

/** @var yii\web\View $this */
/** @var app\models\Meet $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="meet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'organization_id')->dropDownList($items,
        ['prompt' => 'Выберите организацию']
    ); ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'datetime-local'])  ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Назначить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
