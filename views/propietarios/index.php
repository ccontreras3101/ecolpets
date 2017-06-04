<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PropietariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propietarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propietarios-index">
<div class= "formulario">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevos Propietarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'propietarios_id',
            'propietarios_doc',
            'propietarios_nombre',
            'propietarios_apellido',
            'propietarios_telf',
            'propietarios_email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
