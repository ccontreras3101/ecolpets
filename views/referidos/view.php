<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Referidos */

$this->title = $model->referidos_id;
$this->params['breadcrumbs'][] = ['label' => 'Referidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referidos-view">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->referidos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->referidos_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea ud Eliminar éste item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'referidos_id',
            'referidos_nombre',
            'referidos_telf',
            'referidos_email:email',
        ],
    ]) ?>
</div>
</div>
