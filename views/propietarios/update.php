<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Propietarios */

$this->title = 'Update Propietarios: ' . $model->propietarios_id;
$this->params['breadcrumbs'][] = ['label' => 'Propietarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->propietarios_id, 'url' => ['view', 'id' => $model->propietarios_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propietarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
