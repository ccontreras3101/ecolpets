<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Propietarios;

/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mascotas-form">
<div class= "formulario  col-md-6 col-md-offset-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mascotas_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mascotas_peso')->textInput() ?>
    
    <?= $form->field($model, 'mascotas_raza')->textInput() ?>

    <?= $form->field($model, 'mascotas_fdef')->widget(DatePicker::classname(), [
        'language' => 'es',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy',
            'todayHighlight' => true,
            ], 
        ])  
    ?>
                    
    <?= $form->field($model, 'mascotas_edad')->textInput() ?>


    <?= $form->field($model, 'propietarios_id')->dropDownList(ArrayHelper::map(Propietarios::find()->all(),'propietarios_id', 'propietarios'),[
            'prompt'=>'seleccione un propietario']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
