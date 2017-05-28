<?php
use kartik\mpdf\Pdf;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Referidos;

$this->title = $model->procesos_id;
$this->params['breadcrumbs'][] = ['label' => 'Procesos', 'url' => ['index']];


// http response
$response = Yii::$app->response;
$response->format = \yii\web\Response::FORMAT_RAW;
$headers = Yii::$app->response->headers;
$headers->add('Content-Type', 'application/pdf');
?>

<div class="fondo">
<div class="subtittle"> Hacemos constar que hemos efectuado el proceso de Hidrolisis Alcalina al animal de compañía:
</div>
	<table>
		<tr>
			<td>
			 	<h5 class="sub_table">NOMBRE </h5>
			</td >
			<td colspan="2">
				<?= $model->mascotas->mascotas_nombre; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="sub_table">RAZA</h5>
			</td>
			<td colspan="2">
				<?= $model->mascotas->mascotas_raza; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="sub_table">PROPIEDAD DE:</h5>
			</td>
			<td colspan="2">
				<?= $model->propietarios->propietarios_nombre.",".$model->propietarios->propietarios_apellido; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="sub_table">EN LA FECHA</h5>
			</td>
			<td colspan="2">
				<?= $model->fecha_serv; ?>
			</td>
			<tr>
			<td>
				<h5 class="sub_table">BAJO EL LIBRO N° <?= $model->procesos_libro; ?></h5>
			</td>
			<td>
				<h5 class="sub_table">PÁGINA <?= $model->procesos_pagina; ?></h5>
			</td>
			<td>
				<h5 class="sub_table">LINEA <?= $model->procesos_linea; ?></h5>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="sub_table">NOMBRE DE LA EMPRESA:</h5>
			</td>
			<td colspan="2">
				<?= $model->planes->planes_nombre; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="sub_table">TIPO DE PROCEDIMIENTO:</h5>
			</td>
			<td colspan="2">
				Hidrólisis <?= $model->planes->planes_nombre; ?>
			</td>
		</tr>
	</table>
</div>