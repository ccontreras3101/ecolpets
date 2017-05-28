<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Referidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referidos-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'referidos_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referidos_telf')->textInput() ?>

    <?= $form->field($model, 'referidos_email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
