<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planes */

$this->title = 'Modificar Plan: ' . $model->planes_id;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->planes_id, 'url' => ['view', 'id' => $model->planes_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
