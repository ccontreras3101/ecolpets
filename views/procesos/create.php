<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\web\JsExpression;
use yii\jui\AutoComplete;


/* @var $this yii\web\View */
/* @var $model app\models\Procesos */

$this->title = 'Nuevo Proceso';
$this->params['breadcrumbs'][] = ['label' => 'Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procesos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'data' => $data,
    ]) ?>

</div>
