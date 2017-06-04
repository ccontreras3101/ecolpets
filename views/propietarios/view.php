<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Propietarios */

$this->title = $model->propietarios_id;
$this->params['breadcrumbs'][] = ['label' => 'Propietarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propietarios-view">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->propietarios_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->propietarios_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea ud Eliminar éste propietaros?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'propietarios_id',
            'propietarios_doc',
            'propietarios_nombre',
            'propietarios_apellido',
            'propietarios_telf',
            'propietarios_email:email',
        ],
    ]) ?>
</div>
</div>
