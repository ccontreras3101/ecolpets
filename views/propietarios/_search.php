<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PropietariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propietarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'propietarios_id') ?>

    <?= $form->field($model, 'propietarios_doc') ?>

    <?= $form->field($model, 'propietarios_nombre') ?>

    <?= $form->field($model, 'propietarios_apellido') ?>

    <?= $form->field($model, 'propietarios_telf') ?>

    <?php // echo $form->field($model, 'propietarios_email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
