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
    public $propietarios_dir;
    public $propietarios_cel;
	/* planes select*/
    public $planes_id;
	public $planes_nombre;
	/*referidos*/
    public $referidos_id;
	public $referidos_nombre;
    public $referidos_telf;
    public $referidos_email;
    public $referidos_dir;
    public $referidos_nit;
    public $referidos_rep;
    public $referidos_ced;
    public $cod_registro;
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
    public $hora_programada;
    public $checktype;
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
    /*comisiones*/
    public $comision_id;
    public $comision_tipo;
    public $comision_porc;

    public $select_id;
    public $tipo;

    public $rowvisible;
	/**

     * @return array the validation rules.
     */    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['recepcion_fecha','mascotas_nombre','urna_id','devolucion_id','recepcion_hidro','id_tipo' ],'required',],
            [['recepcion_fecha','mascotas_fdef'], 'date','message'=> 'Debe seleccionar una fecha'],
            [['propietarios_email', 'referidos_email'], 'email','message'=> 'Debe colocar un correo valido'],
            [['mascotas_nombre', 'propietarios_nombre', 'propietarios_apellido', 'referidos_nombre', 'devolucion_nombre', 'tipo_mascota'], 'string', 'max' => 50],
            [['obs', 'propietarios_dir'], 'string', 'max' => 250],
            [['comision_tipo','referidos_dir',  'referidos_rep' ], 'string', 'max'=>50],
            [[  'recepcion_id', 'id_tipo','select_id'],'integer'],
            [['devolucion_id','mascotas_id','procesos_id', 'propietarios_id','referidos_id','planes_nombre'],'integer'],
            [['fecha_ing', 'fecha_serv', 'recepcion_fecha','hora_programada', 'checktype'], 'safe'],
            [['propietarios_telf','propietarios_cel', 'referidos_telf', 'mascotas_raza'], 'string', 'max' => 50],
            [['propietarios_doc', 'planes_id', 'comision_id', 'comision_porc'], 'integer'],
            [['urna_id', 'referidos_id','mascotas_edad','recepcion_hidro'], 'integer'],
            [['urna_nombre', 'urna_descript','planes_nombre', 'tipo', 'cod_registro'], 'string', 'max' =>50],
            [['mascotas_fdef','fecha_programada'], 'safe'],
            [['mascotas_peso'],'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/', 'message'=> 'Solo coma (,) como décimal'],
            [['procesos_libro', 'procesos_pagina', 'procesos_linea', 'referidos_nit', 'referidos_ced'],'integer'],


        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'mascotas_id'=>'Codigo de Mascota',
        	'mascotas_nombre'=> 'Nombre ', 
        	'mascotas_peso'=> ' Kgs/Grs',
            'tipo_mascota'=>'Canino/Felino/Otros',
            'mascotas_fdef'=>'Fecha de Defunción',
            'mascotas_raza'=>'Raza',
            'mascotas_edad'=>'Edad ',
        	'propietarios_doc'=> 'Cédula ',
        	'propietarios_nombre'=> 'Nombres',
        	'propietarios_apellido'=> 'Apellidos',
        	'propietarios_telf'=> 'Teléfono Fijo', 
        	'propietarios_email'=> 'Email',
            'propietarios_cel' => 'Teléfono Celular',
            'propietarios_dir' => 'Dirección',
        	'planes_nombre'=> 'Plan escogido',
        	'referidos_nombre'=> 'Empresa',
            'referidos_telf'=> 'Telefono',
            'referidos_email'=> 'Email',
        	'fecha_ing'=> 'Fecha de Ingreso',
        	'fecha_serv'=> 'Fecha del Procesamiento',
        	'obs'=> 'Observaciones',
            'procesos_libro'=>'Libro',
            'procesos_pagina'=>'Página',
            'procesos_linea'=>'Linea',
            'recepcion_hidro'=>'',
            'urna_nombre'=>'',
            'recepcion_fecha'=>'Recepción',
            'urna_id'=> '',
            'fecha_programada'=>'Fecha Programada',
            'devolucion_id'=>'Devolucion de Restos',
            'devolucion_nombre'=>'',
            'recepcion_id'=>'',
            'planes_id'=>'Plan',
            'id_tipo'=>'Tipo',
            'hora_programada' => 'Hora Programada',
            'referidos_dir' => 'Dirección', 
            'referidos_nit' => 'Nit Empresa', 
            'referidos_rep' => 'Representante Legal', 
            'referidos_ced' => 'Cédula/Nit Representante',
            'checktype'=>'',
            'procesos_id'=>'Proceso N°',
            'cod_registro'=> 'Cód. de Registro',
        ];
    }
    

}
?>



