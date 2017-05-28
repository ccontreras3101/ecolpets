<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */

$this->title = 'Modificar Mascotas: ' . $model->mascotas_id;
$this->params['breadcrumbs'][] = ['label' => 'Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mascotas_id, 'url' => ['view', 'id' => $model->mascotas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mascotas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
