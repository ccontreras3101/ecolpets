<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Procesos;
use app\models\Mascotas;
use app\models\Recepcionclinica;

/* @var $this yii\web\View */
/* @var $model app\models\Propietarios */

$this->title = $model->propietarios_nombre.",".$model->propietarios_apellido;
$this->params['breadcrumbs'][] = ['label' => 'Propietarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propietarios-view">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->propietarios_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Nuevo Propietario', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'propietarios_id',
            'propietarios_doc',
            'propietarios_nombre',
            'propietarios_apellido',
            'propietarios_dir',
            'propietarios_telf',
            'propietarios_cel',
            
            
        ],
    ]) ?>
</div>
</div>
