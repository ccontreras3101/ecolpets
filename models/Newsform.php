<?php
namespace app\models;

use Yii;
use yii\base\Model;

class Newsform extends Model
{
	/* mascotas*/
	public $mascotas_nombre;
	public $mascotas_peso;
    public $mascotas_tipo;
    public $mascotas_raza;
	/*propietarios*/
    public $propietarios_id;
	public $propietarios_doc;
	public $propietarios_nombre;
	public $propietarios_apellido;
	public $propietarios_telf;
	public $propietarios_email;
	/* planes select*/
	public $planes_nombre;
	/*referidos*/
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
    public $tipo_mascota;
    /*id*/
    /*public $mascotas_id;
    public $procesos_id;
    public $propietarios_id;
    public $referidos_id;
    public $planes_id;*/

	/**
     * @return array the validation rules.
     */    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['mascotas_nombre', 'mascotas_peso','mascotas_tipo','mascotas_raza', 'propietarios_doc', 'propietarios_nombre', 'propietarios_apellido', 'propietarios_email', 'referidos_nombre','propietarios_telf', 'referidos_telf', 'referidos_email','fecha_ing', 'fecha_serv','procesos_libro', 'procesos_pagina', 'procesos_linea', 'tipo_mascota'], 'required', 'message'=> 'campo obligatorio'],
            [['propietarios_email', 'referidos_email'], 'email','message'=> 'Debe colocar un correo valido'],
            [['mascotas_nombre', 'propietarios_nombre', 'propietarios_apellido', 'referidos_nombre'], 'string', 'max' => 50],
            [['obs'], 'string', 'max' => 255],
            [['mascotas_peso', 'propietarios_telf'],'integer'],
            [['mascotas_id','procesos_id', 'propietarios_id','referidos_id','planes_nombre'],'integer'],
            [['fecha_ing', 'fecha_serv'], 'safe'],
            [['propietarios_telf', 'referidos_telf'], 'string', 'max' => 20],
           
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
        	'mascotas_nombre'=> 'Nombre de la Mascota', 
        	'mascotas_peso'=> 'Peso en Kgs (individual)',
            'mascotas_tipo'=>'(Canino/Felino/Otros...)',
            
            'mascotas_raza'=>'Raza',
        	'propietarios_doc'=> 'Cédula de Identidad',
        	'propietarios_nombre'=> 'Nombre del Propietario',
        	'propietarios_apellido'=> 'Apellido del Propietario',
        	'propietarios_telf'=> 'Telefono de Contacto', 
        	'propietarios_email'=> 'Email del Propietario',
        	'planes_nombre'=> 'Plan escogido',
        	'referidos_nombre'=> 'Referente',
            'referidos_telf'=> 'Telefono del Referente',
            'referidos_email'=> 'Email del Referente',
        	'fecha_ing'=> 'Fecha de Ingreso',
        	'fecha_serv'=> 'Fecha del Procesamiento',
        	'obs'=> 'Observaciones',
            'procesos_libro'=>'Libro',
            'procesos_pagina'=>'Página',
            'procesos_linea'=>'Linea',



        ];
    }
    

}
?>



