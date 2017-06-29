<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcesosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mascotas Recibidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class= "formulario formulario_index">
  <div class="recepcion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Mascota', ['create'], ['class' => 'btn btn-primary']) ?>
    
        <?= Html::a('Listado', ['index'], ['class' => 'btn btn-info']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute'=>'', 
            'value'=>function($model){
                    return 'Pet-00'. $model->mascotas_id;
                },
            'label'=>'Cod. Mascota',
            ],
            'mascotas_id'=>'mascotas.mascotas_nombre',
            'id_tipo'=>'tipos.tipo_mascota',
            ['attribute'=>'', 
              'value'=>'propietarios.propietarios',
              'label'=>'Propietario',  
            ],
            ['attribute'=>'', 
              'value'=>'referidos.referidos_nombre',
              'label'=>'Clinica',  
            ],
            'recepcion_fecha',
            'recepcion_id',
            'cod_registro',
            /*end referidos*/
            /*recepcion*/

            
            //'devolucion_id'=>'devolucion.devolucion_nombre',
            /* end recepcion */
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete} {link}',
                'buttons'=>[
                    'view' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/recepcionclinica/view', 'id' => $model->recepcion_id], [
                                'title' => Yii::t('yii', 'Ver'),
                        ]);  
                    },'update' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>',['/recepcionclinica/update', 'id' => $model->recepcion_id], [
                                'title' => Yii::t('yii', 'Editar'),
                        ]);  
                    },'delete' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-list-alt"></span>',['/recepcionclinica/pdf', 'id' => $model->recepcion_id], [
                                'title' => Yii::t('yii', 'Imprimir Planilla de Recepción'),
                        ]);  
                    },'link' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-print"></span>',['/procesos/pdf', 'id' => $model->procesos_id], [
                                'title' => Yii::t('yii', 'Imprimir Certificado de Defunción'),
                        ]);  
                    }

                ]     
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
  </div>
</div>
