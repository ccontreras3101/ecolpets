<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferidosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referidos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'referidos_id') ?>

    <?= $form->field($model, 'referidos_nombre') ?>

    <?= $form->field($model, 'referidos_telf') ?>

    <?= $form->field($model, 'referidos_email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
