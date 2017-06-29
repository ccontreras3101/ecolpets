<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Referidos */

$this->title = $model->referidos_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referidos-view">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->referidos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Nueva Empresa', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'referidos_id',
            'referidos_nombre',
            'referidos_dir',
            'referidos_telf', 
            'referidos_nit',
            //'referidos_email:email',
            'referidos_rep', 
            'referidos_ced',
        ],
    ]) ?>
</div>
</div>
