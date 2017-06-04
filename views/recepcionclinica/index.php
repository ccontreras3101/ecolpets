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
        <?= Html::a('Nueva Mascota', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            /*end referidos*/
            /*recepcion*/

            
            //'devolucion_id'=>'devolucion.devolucion_nombre',
            /* end recepcion */
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
  </div>
</div>
