<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procesos */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Recepcion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recepcion_id, 'url' => ['view', 'id' => $model->recepcion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recepcionclinica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
