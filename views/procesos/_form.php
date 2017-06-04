<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Urnas;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Referidos;
use app\models\Tipos;
use app\models\Mascotas;
use app\models\Recepcion;
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
    
        <div class= "formulario">
            <div class="row">
                <h3>Mascota  </h3>

                <!-- mascotas -->
                <div class="col-lg-2 col-md-2">
                    <?= $form->field($model, 'mascotas_nombre')->textInput() ?>   
                </div>
                <div class="col-lg-2 col-md-2">
                <?= $form->field($model, 'id_tipo')->dropDownList(ArrayHelper::map(Tipos::find()->all(),'id_tipo', 'tipo_mascota'),[
                    'prompt'=>'seleccione un tipo']) ?>
                </div>
                <div class="col-lg-2 col-md-2">
                    <?= $form->field($model, 'mascotas_raza')->textInput() ?>
                </div>
                <div class="col-lg-1 col-md-1">
                    <?= $form->field($model, 'mascotas_peso')->textInput() ?>
                </div>
                <div class="col-lg-1 col-md-1">
                    <?= $form->field($model, 'mascotas_edad')->textInput() ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'mascotas_fdef')->widget(DatePicker::classname(), [
                    'language' => 'es',
                    'pluginOptions' => [
                           'autoclose'=>true,
                           'format' => 'dd/mm/yyyy',
                           'todayHighlight' => true,
                       ], 
                    ])  ?>
                    
                </div>
            </div>
            <!-- end mascotas-->
            <div class="row">
            <h3>Propietario</h3>
            <!-- Propietarios -->
                <div class="col-lg-3 col-md-3">
                
                    <?= $form->field($model, 'propietarios_nombre')->textInput() ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_apellido')->textInput() ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_doc')->textInput() ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_telf')->textInput() ?>   
                </div>
            </div>
                <!-- fin propietarios -->
            <div class="row">
            <h3>Clinica</h3>
                <!--Nombre de la clinica-->
                <div class="col-lg-4 col-md-4">
                
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
                <!-- fin nombre de la clinica -->
                
                
            </div>
            <div class="row">
                <h3>Registro</h3>
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
                        <?= $form->field($model, 'fecha_serv')->widget(DatePicker::classname(), [
                                   
                        'language' => 'es',
                        'pluginOptions' => [
                               'autoclose'=>true,
                               'format' => 'dd/mm/yyyy',
                               'todayHighlight' => true,
                           ], 
                        ])  ?>
                    </div>
                
                </div>
                
            <!-- fin mascotas--> 
            <div class="form-group">
                <?= Html::submitButton( 'Guardar' , ['class' =>  'btn btn-info' ]) ?>
            </div>
            <br>
        </div><!--formulario-->
    <?php ActiveForm::end(); ?>
</div><!--recepcionclinica-form-->
<script type="text/javascript">
   
        
   
</script>