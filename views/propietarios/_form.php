<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Propietarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propietarios-form">
<div class= "formulario">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'propietarios_doc')->textInput() ?>

    <?= $form->field($model, 'propietarios_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propietarios_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propietarios_telf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propietarios_email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
