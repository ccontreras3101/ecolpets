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
use kartik\date\DatePicker;
use yii\web\JsExpression;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */
/* @var $form yii\widgets\ActiveForm */

?>
<div class= "formulario formulario_index">
<div class="recepcionclinica-form">

    <?php $form = ActiveForm::begin(); ?>
    <!--mascotas -->
    
        
            <div class="row">

                <!--Nombre de la clinica-->
                <h3>Clinica</h3>
                <div class="col-lg-6 col-md-6">
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
            </div>
                <!-- fin nombre de la clinica -->
                <!-- Propietarios -->
            <div class="row">
                <h3>Propietario</h3>
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
                <!-- mascotas -->
            <div class="row">
                <h3>Mascota  </h3>
                <div class="col-lg-2 col-md-2">
                    <?= $form->field($model, 'mascotas_nombre')->textInput(['class'=>'form-control mascota_in']) ?> 

                    
                </div>
                <div class="col-lg-3 col-md-3">
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
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <h4>Devolver Restos</h4>
                    <?=
                    $form->field($model, 'devolucion_id')
                        ->radioList(
                            [1 => 'Si', 2 => 'No'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<label class="modal-radio">';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                                    $return .= '<i></i>';
                                    $return .= '<span>' . ucwords($label) . '</span>';
                                    $return .= '</label>';

                                    return $return;
                                }
                            ]
                        )
                    ->label(false);
                    ?>
                </div>
            
                <div class="col-lg-2 col-md-2">
                    <h4>Hidrodesintegración</h4>
                    <?=
                    $form->field($model, 'planes_id')->dropDownList(ArrayHelper::map(Planes::find()->all(),'planes_id', 'planes_nombre'),[
                    'class'=>'form-control planes','prompt'=>'seleccione un tipo']) ?>
                   <?=
                    $this->registerJs('
                        var planes_id = "";
                        

                          document.getElementById("div_fecha_programada").style.display = "none";
                        $(".planes").change(function(){

                            var planes_id = document.getElementById("newsform-planes_id").options.selectedIndex;
                            if(planes_id == 2){
                                console.log(planes_id);
                                document.getElementById("div_fecha_programada").style.display = "block"; 
                            }else{
                                document.getElementById("div_fecha_programada").style.display = "none";
                                
                            }
                        });
                        ')
                    ?>
                </div>
                <div class="col-lg-3 col-md-3" id="div_fecha_programada">
                    <h4>Fecha Programada</h4>
                    
                    <?= $form->field($model, 'fecha_programada')->widget(DatePicker::classname(), [
                    'class'=>'krajee-datepicker form-control fecha_programada',
                    'language' => 'es',
                    'pluginOptions' => [
                           'autoclose'=>true,
                           'format' => 'dd/mm/yyyy',
                           'todayHighlight' => true,
                       ], 
                    ])  ?>
                    

                    <h6>Cambia solo si es presencial</h6>
                </div>
            
                <div class="col-lg-2 col-md-2">
                <h4>Tipo de Urna</h4>
                    <?= $form->field($model, 'urna_id')->dropDownList(ArrayHelper::map(Urnas::find()->all(),'urna_id', 'urna_nombre'),[
                    'prompt'=>'seleccione un tipo']) ?>
                </div>
            
                <div class="col-lg-3 col-md-3">
                    <h4>Fecha de Recepcion</h4>
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
                <?= Html::submitButton( 'Guardar' , ['class' =>  'btn btn-info' ]) ?>
            </div>
            <br>
        </div><!--formulario-->
    <?php ActiveForm::end(); ?>

</div><!--recepcionclinica-form-->
<script type="text/javascript">
    
                
        
   
</script>