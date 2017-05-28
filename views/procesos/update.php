<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */

$this->title = 'Modificar Procesos: ' . $model->procesos_id;
$this->params['breadcrumbs'][] = ['label' => 'Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->procesos_id, 'url' => ['view', 'id' => $model->procesos_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="procesos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
