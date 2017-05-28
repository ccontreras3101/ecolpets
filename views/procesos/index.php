<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcesosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mascotas Procesadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procesos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Proceso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            /*mascotas*/
            ['attribute'=>'mascotas', 
              'value'=>'mascotas.mascotas_nombre',
              'label'=>'Mascota',
            ],
            /* end mascotas*/
            /*propietarios*/
            ['attribute'=>'propietarios', 
              'value'=>'propietarios.propietarios',
              'label'=>'Propietario',
            ],
            
            /*end propietarios*/
            /*planes*/
            ['attribute'=>'planes', 
              'value'=>'planes.planes_nombre',
              'label'=>'Plan Contratado',  
            ],
            /*end planes*/
            /*referidos*/
            ['attribute'=>'referidos', 
              'value'=>'referidos.referidos_nombre',
              'label'=>'Referido por',  
            ],
            /*end referidos*/


            /*'procesos_id',
            'planes_id',
            'mascotas_id',
            'propietarios_id',
            'referidos_id',*/
            'procesos_libro',
            'procesos_pagina',
            'procesos_linea',
            'fecha_ing',
            'fecha_serv',
            'obs',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
