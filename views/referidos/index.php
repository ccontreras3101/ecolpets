<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferidosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referidos-index">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Empresa', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'referidos_id',
            [
            'attribute'=>'', 
            'value'=>function($model){
                    return 'Em-00'. $model->referidos_id;
                },
            'label'=>'Cod. Empresa',
            ],
            'referidos_nombre',
            'referidos_telf',
            //'referidos_email:email',
            
            [
            'attribute'=>'', 
            'value'=> 'referidos_dir', 
            'label'=>'Dirección',
            ], 
            'referidos_nit', 
            [
            'attribute'=>'', 
            'value'=> 'referidos_rep',
            'label'=>'Representante',
            ], 
            [
            'attribute'=>'referidos_ced', 
            'value'=> 'referidos_ced',
            'label'=>'Cédula',
            ],
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/referidos/view', 'id' => $model->referidos_id], [
                                'title' => Yii::t('yii', 'Ver'),
                        ]);  
                    },'update' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>',['/referidos/update', 'id' => $model->referidos_id], [
                                'title' => Yii::t('yii', 'Editar'),
                        ]);  
                    }

                ]     
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
