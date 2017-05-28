<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Referidos;
use app\models\Tipos;
use kartik\date\DatePicker;
use yii\web\JsExpression;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="procesos-form">

    <?php $form = ActiveForm::begin(); ?>
    <!--mascotas -->
    <div class="row">
        
        <div class="col-lg-3 col-md-3">
        <?= $form->field($model, 'mascotas_nombre')->textInput() ?>   
        </div>
        <div class="col-lg-3 col-md-3">
        <?= $form->field($model, 'mascotas_peso')->textInput() ?>
        </div>
        <div class="col-lg-3 col-md-3">
        <?= $form->field($model, 'mascotas_tipo')->dropDownList(ArrayHelper::map(Tipos::find()->all(),'id_tipo', 'tipo_mascota'),[
            'prompt'=>'seleccione un tipo']) ?>
        </div>
        <div class="col-lg-3 col-md-3">
        <?= $form->field($model, 'mascotas_raza')->textInput() ?>
        </div>
    </div>  
    <!--propietarios-->
    <div class="row">
        <div class="col-lg-4 col-md-4">
        <?php $data = Propietarios::find()->select(['propietarios_doc as value', 'propietarios_doc as  label','propietarios_id as id', 'propietarios_nombre as nombre', 'propietarios_apellido as apellido', 'propietarios_telf as telf', 'propietarios_email as email'])->asArray()->all(); ?>
            <?= $form->field($model, 'propietarios_doc')->widget(\yii\jui\AutoComplete::classname(), [
            'name' => 'propietarios_doc',    
            'id' => 'propietarios_id',
            'clientOptions' => [
            'source' => $data,
            'autoFill'=>true,
            'select' => new JsExpression("function( event, ui ) {
                $('#newsform-propietarios_doc').val(ui.item.value);
                $('#prop_doc').val(ui.item.value);
                $('#newsform-propietarios_nombre').val(ui.item.nombre);
                $('#newsform-propietarios_apellido').val(ui.item.apellido);
                $('#newsform-propietarios_telf').val(ui.item.telf);
                $('#newsform-propietarios_email').val(ui.item.email);
                    console.log(ui.item);
            }")
            ],
            ]) ?>   
        </div>
        <div class="col-lg-4 col-md-4">
            <?= $form->field($model, 'propietarios_nombre')->textInput() ?>    
        </div>
        <div class="col-lg-4 col-md-4">
            <?= $form->field($model, 'propietarios_apellido')->textInput() ?>    
        </div>
        
        <div class="col-lg-6 col-md-6">
            <?= $form->field($model, 'propietarios_telf')->textInput() ?>    
        </div>
        <div class="col-lg-6 col-md-6">
            <?= $form->field($model, 'propietarios_email')->textInput() ?>
        </div>    
    </div>
    <!--planes-->
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <?= $form->field($model, 'planes_nombre')->dropDownList(ArrayHelper::map(Planes::find()->all(),'planes_id', 'planes_nombre'),[
            'prompt'=>'seleccione un plan']) ?>
        </div>
    <!--referidos-->
        <div class="col-lg-3 col-md-3">
            <?php $data_ = Referidos::find()->select(['referidos_nombre as value', 'referidos_nombre as  label','referidos_id as id', 'referidos_telf as ref_telf', 'referidos_email as ref_email'])->asArray()->all(); ?>
            <?= $form->field($model, 'referidos_nombre')->widget(\yii\jui\AutoComplete::classname(), [
            'name' => 'referidos_nombre',    
            'id' => 'referidos_nombre',
            'clientOptions' => [
            'source' => $data_,
            'autoFill'=>true,
            'select' => new JsExpression("function( event, ui ) {
                $('#newsform-referidos_nombre').val(ui.item.label);
                $('#newsform-referidos_telf').val(ui.item.ref_telf);
                $('#newsform-referidos_email').val(ui.item.ref_email);
                
                    console.log(ui.item);
            }")
            ],
            ]) ?>   
        </div>
        <div class="col-lg-3 col-md-3">
            <?= $form->field($model, 'referidos_telf')->textInput() ?> 
        </div>   
        <div class="col-lg-3 col-md-3">
        <?= $form->field($model, 'referidos_email')->textInput() ?> 
        </div>
    

    <!--procesos-->
    </div>
    
    <div class="row">
        <!--datos de registro -->
        <div class="col-lg-2 col-md-2">
        <?= $form->field($model, 'procesos_libro')->textInput() ?>   
        </div>
        <div class="col-lg-2 col-md-2">
        <?= $form->field($model, 'procesos_pagina')->textInput() ?>
        </div>
        <div class="col-lg-2 col-md-2">
        <?= $form->field($model, 'procesos_linea')->textInput() ?>   
        </div>
        
        <div class="col-lg-3 col-md-3">
            <?= $form->field($model, 'fecha_ing')->widget(DatePicker::classname(), [
            'language' => 'es',
            'pluginOptions' => [
                   'autoclose'=>true,
                   'format' => 'yyyy/mm/dd',
                   'todayHighlight' => true,
               ], 
            ])  ?>
        </div>


        <div class="col-lg-3col-md-3">
            <?= $form->field($model, 'fecha_serv')->widget(DatePicker::classname(), [
                       
            'language' => 'es',
            'pluginOptions' => [
                   'autoclose'=>true,
                   'format' => 'yyyy/mm/dd',
                   'todayHighlight' => true,
               ], 
            ])  ?>
        </div>
    <!-- end datos de registro-->
        
    </div>

    <div class="row">

        <div class=" col-lg-12 col-md-12">
            <?= $form->field($model, 'obs')->textArea(['row' => 5]) ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton( 'Guardar' , ['class' =>  'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    

</script>