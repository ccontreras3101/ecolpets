<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */

$this->title = $model->mascotas_id;
$this->params['breadcrumbs'][] = ['label' => 'Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mascotas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->mascotas_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->mascotas_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea Ud. Eliminar éste item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mascotas_id',
            'mascotas_nombre',
            'mascotas_peso',
            'mascotas_tipo',
            'mascotas_raza',
            'propietarios_id',
            
        ],
    ]) ?>

</div>
