<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PropietariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propietarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propietarios-index">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Incluir Propietario', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'propietarios_id',
            'propietarios_doc',
            'propietarios_nombre',
            'propietarios_apellido',
            'propietarios_telf',
            'propietarios_dir',
            'propietarios_cel',
            

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/propietarios/view', 'id' => $model->propietarios_id], [
                                'title' => Yii::t('yii', 'Ver'),
                        ]);  
                    },'update' => function ($url, $model) {     
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>',['/propietarios/update', 'id' => $model->propietarios_id], [
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
