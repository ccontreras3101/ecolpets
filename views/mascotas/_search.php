<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MascotasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mascotas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mascotas_id') ?>

    <?= $form->field($model, 'mascotas_nombre') ?>

    <?= $form->field($model, 'mascotas_peso') ?>
    
    <?= $form->field($model, 'mascotas_tipo') ?>

    <?= $form->field($model, 'mascotas_raza') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
