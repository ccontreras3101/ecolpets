<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Referidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referidos-form">
<div class= "formulario">
    <?php $form = ActiveForm::begin(); ?>
<div class="row empresa">
                <!--Nombre de la clinica-->
                <h3>Empresa</h3>
                <div class="col-lg-3 col-md-3">
                    <?= $form->field($model,  'referidos_nit')->textInput() ?>
                </div>
                <div class="col-lg-3 col-md-3" >
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
            </div>
                <!-- fin nombre de la clinica -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
