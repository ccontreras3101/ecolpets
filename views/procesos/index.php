<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcesosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procesar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class= "formulario formulario_index">
<div class="procesos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--<?= Html::a('Nuevo Proceso', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            /*mascotas*/
            ['attribute'=>'', 
              'value'=>'mascotas.mascotas_nombre',
              'label'=>'Mascota',
            ],
            /* end mascotas*/
            //'planes_id'=>'planes.planes_nombre',
            /*propietarios*/
            ['attribute'=>'', 
              'value'=>'propietarios.propietarios',
              'label'=>'Propietario',
            ],
            
            ['attribute'=>'', 
              'value'=>'referidos.referidos_nombre',
              'label'=>'Clinica',  
            ],
            ['attribute'=>'cod_registro', 
              'value'=>'referidos.cod_registro',
              'label'=>'Cod. Registro',  
            ],
            /*end referidos*/
            'procesos_libro',
            'procesos_pagina',
            'procesos_linea',
            'fecha_ing',
             [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {link}',
                'buttons'=>[
                    'view' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/procesos/view', 'id' => $model->procesos_id], [
                                'title' => Yii::t('yii', 'Ver'),
                        ]);  
                    },'update' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>',['/procesos/update', 'id' => $model->procesos_id], [
                                'title' => Yii::t('yii', 'Procesar'),
                        ]);  
                    },'link' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-print"></span>',['/procesos/pdf', 'id' => $model->procesos_id], [
                                'title' => Yii::t('yii', 'Imprimir Certificado'),
                        ]);  
                    }

                ]     
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
