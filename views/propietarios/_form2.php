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
     <div class="row">
                <h2>Modificar Datos</h2>
            </div>

   <div class="row cliente" >
                <h3>Propietario</h3>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_doc')->textInput() ?>
                    
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
            <div class="row cliente" >
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_telf')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9999-999-99-99',
                        ]) ?>   
                </div>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model, 'propietarios_cel')->textInput() ?>   
                </div>
            </div>

                <!-- fin propietarios -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
