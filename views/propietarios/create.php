<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Propietarios */

$this->title = 'Nuevos Propietarios';
$this->params['breadcrumbs'][] = ['label' => 'Propietarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propietarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
