<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Referidos;
use app\models\Urnas;
use app\models\Tipos;
use app\models\TiposSearch;
use app\models\Devolucion;
use app\models\DevolucionSearch;
// use app\models\Procesos;

use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */

$this->title = $model->mascotas->mascotas_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recepcion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class= "formulario formulario_index">
  <div class="recepcion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->recepcion_id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir Recibo', ['/recepcionclinica/pdf','id' => $model->recepcion_id], [
            'class'=>'btn btn-info', 
            'target'=>'_blank', 
            'data-toggle'=>'tooltip', 
            'title'=>'Impresión Recibo de Mascota'
        ]);
        ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recepcion_id',
            [
              'value'=>$model->mascotas->mascotas_nombre,
              'label'=>'Mascota',  
            ],
            // [
            //   'value'=>$model->tipo_mascota,
            //   'label'=>'Tipo',  
            // ],
              'id_tipo'=>'tipos.tipo_mascota',
            [
              'value'=>$model->mascotas->mascotas_raza,
              'label'=>'Raza',  
            ],
            [
              'value'=>$model->mascotas->mascotas_peso,
              'label'=>'Peso',  
            ],
            [
              'value'=>$model->referidos->referidos_nombre,
              'label'=>'Clinica',  
            ],
            [
              'value'=>$model->propietarios->propietarios_nombre.",".$model->propietarios->propietarios_apellido,
              'label'=>'Propietario',  
            ],
            'devolucion_id'=>'devolucion.devolucion_nombre',
            'planes_id'=>'planes.planes_nombre',
            [
              'value'=>$model->urnas->urna_nombre,
              'label'=>'Tipo de Urna',  
            ],
            'recepcion_fecha',  
        ],
    ]) ?>

  </div>
</div>
