<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Referidos;
use app\models\Recepcionclinica;
use app\models\Mascotas;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */

$this->title = $model->mascotas->mascotas_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class= "formulario formulario_index">
<div class="procesos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->procesos_id], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir Certificado', ['/procesos/pdf','id' => $model->procesos_id], [
            'class'=>'btn btn-info', 
            'target'=>'_blank', 
            'data-toggle'=>'tooltip', 
            'title'=>'Impresión del Certificado de Hidrólisis de la Mascota'
        ]);
        ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'procesos_id',
            [
              'value'=>$model->mascotas->mascotas_nombre,
              'label'=>'Mascota',  
            ],
            [
              'value'=>$model->mascotas->mascotas_raza,
              'label'=>'Raza',  
            ],
            [
              'value'=>$model->mascotas->mascotas_peso,
              'label'=>'Peso',  
            ],
            [
              'value'=>$model->mascotas->mascotas_fdef,
              'label'=>'Fecha de Defunción',  
            ],
            [
              'value'=>$model->mascotas->mascotas_edad,
              'label'=>'Edad',  
            ],
            [
              'value'=>$model->propietarios->propietarios_nombre.",".$model->propietarios->propietarios_apellido,
              'label'=>'Propietario',  
            ],
            [
              'value'=>$model->propietarios->propietarios_doc,
              'label'=>'Cedula',  
            ],
            [
              'value'=>$model->propietarios->propietarios_telf,
              'label'=>'Telefono',  
            ],
            
            [
              'value'=>$model->referidos->referidos_nombre,
              'label'=>'Clinica',  
            ],
            'procesos_libro',
            'procesos_pagina',
            'procesos_linea',
            'fecha_ing',
            'fecha_serv',

        ],
    ]) ?>

</div>
</div>
