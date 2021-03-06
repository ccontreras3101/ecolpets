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
    <?= 
$this->registerJs('
   $("#newsform-mascotas_nombre").attr("disabled", "disabled");
   $("#newsform-id_tipo").attr("disabled", "disabled"); 
   $("#newsform-mascotas_raza").attr("disabled", "disabled"); 
   $("#newsform-mascotas_peso").attr("disabled", "disabled"); 
   $("#newsform-mascotas_edad").attr("disabled", "disabled"); 
   $("#newsform-mascotas_fdef").attr("disabled", "disabled"); 
   $("#newsform-propietarios_nombre").attr("disabled", "disabled"); 
   $("#newsform-propietarios_apellido").attr("disabled", "disabled"); 
   $("#newsform-propietarios_doc").attr("disabled", "disabled"); 
   $("#newsform-propietarios_telf").attr("disabled", "disabled"); 
   $("#newsform-referidos_nombre").attr("disabled", "disabled"); 
   $("#newsform-referidos_telf").attr("disabled", "disabled");    
   ')
?>
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
                
                    <?= $form->field($model, 'referidos_nombre')->textInput() ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'referidos_telf')->textInput() ?> 
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
                <?= Html::submitButton( 'Procesar' , ['class' =>  'btn btn-info' ]) ?>
            </div>
            <br>
        </div><!--formulario-->
    <?php ActiveForm::end(); ?>
</div><!--recepcionclinica-form-->
