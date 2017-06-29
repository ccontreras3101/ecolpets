<?php
use kartik\mpdf\Pdf;
use app\models\Planes;
use app\models\Propietarios;
use app\models\Urnas;
use app\models\Devolucion;
use app\models\Tipos;


$this->title = $model->recepcion_id;
$this->params['breadcrumbs'][] = ['label' => 'Recepcion', 'url' => ['index']];


// http response
$response = Yii::$app->response;
$response->format = \yii\web\Response::FORMAT_RAW;
$headers = Yii::$app->response->headers;
$headers->add('Content-Type', 'application/pdf');
?>



	<table class="recepcion">
		<tr>
			<td colspan="2"> 
				<div class="recibo"><h3> Planilla de Recepcion de Cadaver</h3> </div>
			</td>
		</tr>
		<tr>
			<td>
			 	<h5 class="fh5">Clinica </h5>
			</td >
			<td class="td_recibo">
				<?= $model->referidos->referidos_nombre; ?>
			</td>
		</tr>
		
		<tr>
			<td>
				<h5 class="fh5">Propiedad de:</h5>
			</td>
			<td class="td_recibo">
				<?= $model->propietarios->propietarios_nombre.",".$model->propietarios->propietarios_apellido; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Nombre de la Mascota:</h5>
			</td>
			<td class="td_recibo">
				<?= $model->mascotas->mascotas_nombre; ?>
			</td>
		</tr>
		
		<tr>
			<td>
				<h5 class="fh5">Raza</h5>
			</td>
			<td class="td_recibo">
				<?= $model->mascotas->mascotas_raza; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Peso en Kgs</h5>
			</td>
			<td class="td_recibo">
				<?= $model->mascotas->mascotas_peso; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Fecha de Defuncion</h5>
			</td>
			<td class="td_recibo">
				<?= $model->mascotas->mascotas_fdef; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Plan de Hidrólisis Alcalina</h5>
			</td>
			<td class="td_recibo">
				<?= $model->planes->planes_nombre; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Fecha Programada</h5>
			</td>
			<td class="td_recibo">
				<?= $model->fecha_programada; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Hora Programada</h5>
			</td>
			<td class="td_recibo">
				<?= $model->hora_programada; ?>
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Firma de la Clinica</h5>
			</td>
			<td class="td_recibo">
				
			</td>
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Firma del Propietario</h5>
			</td>
			<td class="td_recibo">
				
			</td>
		</tr>
		<tr>
			
		</tr>
		<tr>
			<td>
				<h5 class="fh5">Fecha de Recepcion</h5>
			</td>
			<td class="td_recibo">
				<?= $model->recepcion_fecha ?>
			</td>
		</tr>

	</table>
