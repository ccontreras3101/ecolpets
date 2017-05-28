<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Referidos */

$this->title = 'Crear Referidos';
$this->params['breadcrumbs'][] = ['label' => 'Referidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
