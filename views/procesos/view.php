<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Referidos;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */

$this->title = $model->procesos_id;
$this->params['breadcrumbs'][] = ['label' => 'Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procesos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->procesos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->procesos_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea ud Eliminar éste item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir Certificado', ['/procesos/pdf','id' => $model->procesos_id], [
            'class'=>'btn btn-danger', 
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
              'value'=>$model->planes->planes_nombre,
              'label'=>'Plan Contratado',  
            ],
            
            [
              'value'=>$model->mascotas->mascotas_nombre,
              'label'=>'Nombre de la Mascota',  
            ],
            
            [
              'value'=>$model->propietarios->propietarios_nombre.",".$model->propietarios->propietarios_apellido,
              'label'=>'Propietario',  
            ],
            'referidos_id',
            [
              'value'=>$model->referidos->referidos_nombre,
              'label'=>'Referido por',  
            ],
            'procesos_libro',
            'procesos_pagina',
            'procesos_linea',
            'fecha_ing',
            'fecha_serv',
            'obs',
        ],
    ]) ?>


</div>
