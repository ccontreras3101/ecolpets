<?php

use yii\helpers\Html;
/*use yii\grid\GridView;
use yii\widgets\Pjax;*/
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferidosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsForm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="newsForm-form">


<?php print_r($count); ?>


</div>


