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
use app\models\Select;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
/*Date and time*/
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */
/* @var $form yii\widgets\ActiveForm */

?>
<div class= "formulario formulario_index">
<div class="recepcionclinica-form">

    <?php $form = ActiveForm::begin(); ?>
    <!--mascotas -->
            <div class="row">
                <h3>Seleccione</h3>
                <div class="col-lg-3 col-md-3">
                    <?=
                    $form->field($model, 'select_id')->dropDownList(ArrayHelper::map(Select::find()->all(),'select_id', 'tipo'),[
                    'class'=>'form-control select_','prompt'=>'seleccione un tipo']) ?>
                   <?=
                    $this->registerJs('
                        var select_id = "";
                        $(".empresa").hide();
                        $(".propietario").hide();
                        $(".form-control").prop( "disabled", true );
                        $(".select_").prop("disabled", false);

                        $(".select_").change(function(){
                            var select_id = document.getElementById("newsform-select_id").options.selectedIndex;
                            if (select_id == 2) {
                                $(".form-control").prop("disabled", false);
                                $(".empresa").hide();
                                $(".propietario").show();
                            }else if (select_id == 1){
                                $(".form-control").prop("disabled", false);
                                $(".empresa").show();
                                $(".propietario").show();
                            }else if (select_id == ""){
                                $(".form-control").prop("disabled", true);
                                $(".empresa").hide();
                                $(".propietario").hide();
                                $(".select_").prop("disabled", false);
                            }   
                        });
                        ')
                    ?>
                </div>
            </div>

            <div class="row empresa">
                <!--Nombre de la clinica-->
                <h3>Empresa</h3>
                <div class="col-lg-3 col-md-3">
                    <?php $nit = Referidos::find()->select(['referidos_nit as value', 'referidos_nit as label','referidos_nombre as Enombre','referidos_dir as Edir', 'referidos_telf as Etelf', 'referidos_email as Eemail','referidos_rep as Erep', 'referidos_ced as Eced', 'cod_registro as Ecodigo'])->asArray()->all(); ?>
                    <?= $form->field($model,  'referidos_nit')->widget(\yii\jui\AutoComplete::classname(),[
                        
                        'name'=>'referidos_nit',
                        'id'=>'referidos_nit',
                        'clientOptions'=> [
                            'source'=>$nit,
                            'autoFill'=> true,
                            'select'=> new JsExpression("function( event, ui ){
                                $('#newsform-referidos_nit').val(ui.item.label);
                                $('#newsform-referidos_nombre').val(ui.item.Enombre);
                                $('#newsform-referidos_dir').val(ui.item.Edir);
                                $('#newsform-referidos_telf').val(ui.item.Etelf);
                                $('#newsform-referidos_email').val(ui.item.Eemail);
                                $('#newsform-referidos_rep').val(ui.item.Erep);
                                $('#newsform-referidos_ced').val(ui.item.Eced);
                                $('#newsform-cod_registro').val(ui.item.Ecodigo);
                                }")
                            ],
                        ])
                     ?>
                </div>
                
                <div class="col-lg-3 col-md-3" >
                    <?php $data_ = Referidos::find()->select(['referidos_nombre as value', 'referidos_nombre as  label','referidos_id as id', 'referidos_telf as ref_telf', 'referidos_email as ref_email'])->asArray()->all(); ?>
                    <?= $form->field($model, 'referidos_nombre')->textInput() ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model,  'referidos_dir')->textarea() ?>
                </div>
                 
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'referidos_telf')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9999-999-99-99',
                        ]) ?> 
                </div>   
            </div>
            <div class="row empresa">
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'referidos_email')->textInput() ?> 
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'referidos_rep')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'referidos_ced')->textInput() ?>
                </div>
                 <div class="col-lg-3 col-md-3 mascota">
                    <?= $form->field($model, 'cod_registro')->textInput(['class'=>'form-control mascota_in']) ?>     
                </div>
            </div>
                <!-- fin nombre de la clinica -->
            
                <!-- Propietarios -->
            <div class="row propietario" >
                <h3>Propietario</h3>
                <div class="col-lg-3 col-md-3">
                    <?php $data = Propietarios::find()->select(['propietarios_doc as value', 'propietarios_doc as label', 'propietarios_id as Pid', 'propietarios_nombre as nombre', 'propietarios_apellido as apellido', 'propietarios_telf as fijo', 'propietarios_cel as celular','propietarios_dir as direccion'])->asArray()->all(); ?>
                    <?= $form->field($model, 'propietarios_doc')->widget(\yii\jui\AutoComplete::classname(),[
                        'name'=>'propietarios_doc',
                        'id'=> 'propietarios_doc',
                        'clientOptions'=>[
                        'source'=>$data,
                        'autoFill'=>true,
                        'select'=> new JsExpression("function( event, ui ){
                            $('#newsform-propietarios_doc').val(ui.item.label);
                            $('#newsform-propietarios_nombre').val(ui.item.nombre);
                            $('#newsform-propietarios_apellido').val(ui.item.apellido);
                            $('#newsform-propietarios_dir').val(ui.item.direccion);
                            $('#newsform-propietarios_telf').val(ui.item.fijo);
                            $('#newsform-propietarios_cel').val(ui.item.celular);
                        }")
                        ],
                    ]) ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_nombre')->textInput() ?>
                    
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_apellido')->textInput() ?>   
                </div>
                
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_dir')->textarea() ?>   
                </div>
            </div>
            <div class="row propietario" >
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_telf')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9999-999-99-99',
                        ]) ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_cel')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9999-999-99-99',
                        ]) ?>   
                </div>
            </div>
                <!-- fin propietarios -->
            
                <!-- mascotas -->
            <div class="row">
                <h3>Mascota</h3>
                <div class="col-lg-3 col-md-3 mascota">
                    <?= $form->field($model, 'mascotas_nombre')->textInput(['class'=>'form-control mascota_in mascota']) ?>     
                </div>
                <div class="col-lg-3 col-md-3">
                <?= $form->field($model, 'id_tipo')->dropDownList(ArrayHelper::map(Tipos::find()->all(),'id_tipo', 'tipo_mascota'),[
                    'prompt'=>'seleccione un tipo']) ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'mascotas_raza')->textInput() ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'mascotas_peso')->textInput() ?>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                
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
                <div class="col-lg-3 col-md-3">  
                    <?=
                    $form->field($model, 'planes_id')->dropDownList(ArrayHelper::map(Planes::find()->all(),'planes_id', 'planes_nombre'),[
                    'class'=>'form-control planes','prompt'=>'seleccione un tipo']) ?>
                   <?=
                    $this->registerJs('
                        var planes_id = "";
                        document.getElementById("div_fecha_programada").style.display = "none";
                        document.getElementById("div_hora_programada").style.display = "none";
                        $(".planes").change(function(){

                            var planes_id = document.getElementById("newsform-planes_id").options.selectedIndex;
                            if(planes_id == 2){
                                console.log(planes_id);
                                document.getElementById("div_fecha_programada").style.display = "block";
                                document.getElementById("div_hora_programada").style.display = "block";  
                            }else{
                                document.getElementById("div_fecha_programada").style.display = "none";
                                document.getElementById("div_hora_programada").style.display = "none";
                            }
                        });
                        ')
                    ?>
                </div>
                <div class="col-lg-3 col-md-3" id="div_fecha_programada"> 
                    <?= $form->field($model, 'fecha_programada')->widget(DatePicker::classname(), [
                    'class'=>'krajee-datepicker form-control fecha_programada',
                    'language' => 'es',
                    'pluginOptions' => [
                           'autoclose'=>true,
                           'format' => 'dd/mm/yyyy',
                           'todayHighlight' => true,
                       ], 
                    ])  ?>
                    
                </div>
                <div class="col-lg-3 col-md-3" id="div_hora_programada"> 
                    <?= $form->field($model, 'hora_programada')->widget(TimePicker::classname(), []) ?>
                </div>
                <div class="col-lg-3 col-md-3">  
                    <?= $form->field($model, 'recepcion_fecha')->widget(DatePicker::classname(), [
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
                <?= Html::submitButton( 'Guardar' , ['class' =>  'btn btn-info', 'id' => 'btn_guardar' ]) ?>
            </div>
            <br>
        </div><!--formulario-->
    <?php ActiveForm::end(); ?>

</div><!--recepcionclinica-form-->
<script type="text/javascript">
    
                
        
   
</script>