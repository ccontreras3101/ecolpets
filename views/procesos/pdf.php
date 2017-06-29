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
<div class="col lg-12 col-md-12 codigo">Código de Empresa EM-00<?= $model->referidos->referidos_id; ?></div>
<div class="subtittle certificado"> Hacemos constar que hemos efectuado el proceso de Hidrolisis Alcalina al animal de compañía:
</div>
	<table class="table_certificado">
		<tr>
			<td>
			 	<h5 class="fh5">NOMBRE </h5>
			</td >
			<td colspan="2">
				<?= $model->mascotas->mascotas_nombre; ?>
				PET-00<?= $model->mascotas->mascotas_id; ?>
			</td>
		
		</tr>
		
		<tr>
			<td>
				<h5 class="fh5">RAZA</h5>
			</td>
			<td colspan="2">
				<?= $model->mascotas->mascotas_raza; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">PROPIEDAD DE:</h5>
			</td>
			<td colspan="2">
				<?= $model->propietarios->propietarios_nombre.",".$model->propietarios->propietarios_apellido; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5" >EN LA FECHA</h5>
			</td>
			<td colspan="2">
				<?= $model->fecha_serv; ?>
			</td>
			<tr>
			<td>
				<h5 class="fh5">BAJO EL LIBRO N° <?= $model->procesos_libro; ?></h5>
			</td>
			<td>
				<h5 class="fh5">PÁGINA <?= $model->procesos_pagina; ?></h5>
			</td>
			<td>
				<h5 class="fh5">LINEA <?= $model->procesos_linea; ?></h5>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">CLINICA:</h5>
			</td>
			<td colspan="2">
				<?= $model->referidos->referidos_nombre; ?>
			</td>
		
		</tr>
		<tr>
			<td>
				<h5 class="fh5">TIPO DE PROCEDIMIENTO:</h5>
			</td>
			<td colspan="2">
				Hidrólisis <?= $model->planes->planes_nombre; ?>
			</td>
		</tr>
	</table>
</div>