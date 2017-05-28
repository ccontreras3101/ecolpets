<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProcesosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procesos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!--mascotas -->
    <?= $form->field($model, 'mascotas_nombre') ?>   
    <?= $form->field($model, 'mascotas_peso') ?>  
    <!--propietarios-->
    <?= $form->field($model, 'propietarios_nombre') ?>
    <?= $form->field($model, 'propietarios_apellido') ?>    
    <?= $form->field($model, 'propietarios_telf') ?>    
    <?= $form->field($model, 'propietarios_email') ?>    
    <!--planes-->
    <?= $form->field($model, 'planes_nombre') ?>
    <!--referidos-->
    <?= $form->field($model, 'referidos_nombre') ?>    
    <?= $form->field($model, 'referidos_telf') ?>    
    <?= $form->field($model, 'referidos_email') ?>    
    <!--procesos-->
    <?= $form->field($model, 'procesos_libro') ?>
    <?= $form->field($model, 'procesos_pagina') ?>
    <?= $form->field($model, 'procesos_linea') ?>
    <?= $form->field($model, 'fecha_ing') ?>
    <?= $form->field($model, 'fecha_serv') ?>
    <?= $form->field($model, 'obs') ?>
    


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
