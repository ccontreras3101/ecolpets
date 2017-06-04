<?php
namespace app\models;

use Yii;
use yii\base\Model;

class Newsform extends Model
{
	/* mascotas*/
    public $mascotas_id;
	public $mascotas_nombre;
	public $mascotas_peso;
    
    public $mascotas_raza;
    public $mascotas_fdef;
    public $mascotas_edad;
	/*propietarios*/
    public $propietarios_id;
	public $propietarios_doc;
	public $propietarios_nombre;
	public $propietarios_apellido;
	public $propietarios_telf;
	public $propietarios_email;
	/* planes select*/
    public $planes_id;
	public $planes_nombre;
	/*referidos*/
    public $referidos_id;
	public $referidos_nombre;
    public $referidos_telf;
    public $referidos_email;    
	/*procesos*/
    public $procesos_id;
	public $fecha_ing;
	public $fecha_serv;
	public $obs;
    public $procesos_libro;
    public $procesos_pagina;
    public $procesos_linea;
    /* tipo*/
    public $id_tipo;
    public $tipo_mascota;
    /*recepcion*/
    public $recepcion_id;
    public $recepcion_hidro;
    public $recepcion_fecha;
    public $fecha_programada;
    /*urnas*/
    public $urna_id;
    public $urna_nombre;
    public $urna_descript;
    /*devolucion*/
    public $devolucion_id;
    public $devolucion_nombre;
    
    /*public $mascotas_id;
    public $procesos_id;
    public $propietarios_id;
    public $referidos_id;
    */

	/**
     * @return array the validation rules.
     */    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['recepcion_fecha','mascotas_nombre','urna_id','devolucion_id','recepcion_hidro','mascotas_fdef','id_tipo' ],'required',],
            [['recepcion_fecha','mascotas_fdef'], 'date','message'=> 'Debe seleccionar una fecha'],
            [['propietarios_email', 'referidos_email'], 'email','message'=> 'Debe colocar un correo valido'],
            [['mascotas_nombre', 'propietarios_nombre', 'propietarios_apellido', 'referidos_nombre', 'devolucion_nombre', 'tipo_mascota'], 'string', 'max' => 50],
            [['obs'], 'string', 'max' => 255],
            [['mascotas_peso', 'propietarios_telf', 'mascotas_id', 'recepcion_id', 'id_tipo'],'integer'],
            [['devolucion_id','mascotas_id','procesos_id', 'propietarios_id','referidos_id','planes_nombre'],'integer'],
            [['fecha_ing', 'fecha_serv', 'recepcion_fecha'], 'safe'],
            [['propietarios_telf', 'referidos_telf', 'mascotas_raza'], 'string', 'max' => 50],
            [['propietarios_doc', 'planes_id'], 'integer'],
            [['urna_id', 'referidos_id','mascotas_edad','recepcion_hidro'], 'integer'],
            [['urna_nombre', 'urna_descript','planes_nombre'], 'string', 'max' =>50],
            [['mascotas_fdef','fecha_programada'], 'safe'],
            [['procesos_libro', 'procesos_pagina', 'procesos_linea'],'integer'],


        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
        	'mascotas_nombre'=> 'Nombre ', 
        	'mascotas_peso'=> ' Kgs',
            'tipo_mascota'=>'Canino/Felino/Otros',
            'mascotas_fdef'=>'Fecha de Defunción',
            'mascotas_raza'=>'Raza',
            'mascotas_edad'=>'Edad ',
        	'propietarios_doc'=> 'Cédula de Identidad',
        	'propietarios_nombre'=> 'Nombre',
        	'propietarios_apellido'=> 'Apellido del Propietario',
        	'propietarios_telf'=> 'Telefono de Contacto', 
        	'propietarios_email'=> 'Email del Propietario',
        	'planes_nombre'=> 'Plan escogido',
        	'referidos_nombre'=> 'Clinica',
            'referidos_telf'=> 'Telefono del Clinica',
            'referidos_email'=> 'Email del Clinica',
        	'fecha_ing'=> 'Fecha de Ingreso',
        	'fecha_serv'=> 'Fecha del Procesamiento',
        	'obs'=> 'Observaciones',
            'procesos_libro'=>'Libro',
            'procesos_pagina'=>'Página',
            'procesos_linea'=>'Linea',
            'recepcion_hidro'=>'',
            'urna_nombre'=>'',
            'recepcion_fecha'=>'',
            'urna_id'=> '',
            'fecha_programada'=>'',
            'devolucion_id'=>'Devolucion de Restos',
            'devolucion_nombre'=>'',
            'recepcion_id'=>'',
            'planes_id'=>'',
            'id_tipo'=>'Tipo',
        ];
    }
    

}
?>



