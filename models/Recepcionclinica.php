<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procesos".
 *
 * @property integer $planes_id
 * @property integer $mascotas_id
 * @property integer $propietarios_id
 * @property integer $referidos_id
 * @property string $fecha_ing
 * @property string $fecha_serv
 * @property string $obs
 *
 * @property Propietarios $propietarios
 * @property Mascotas $mascotas
 * @property Planes $planes
 */
class Recepcionclinica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recepcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recepcion_fecha'], 'required'],
            [['recepcion_fecha'], 'date','message'=> 'Debe Seleccionar una Fecha'],
            [['mascotas_id',   'recepcion_id'], 'integer'],
            [['cod_registro'], 'string', 'max' => 20],
            [['mascotas_fdef','recepcion_fecha','fecha_programada', 'hora_programada'], 'safe'],
            [['devolucion_id', 'planes_id' , 'procesos_id'],  'integer'],
            [['mascotas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mascotas::className(), 'targetAttribute' => ['mascotas_id' => 'mascotas_id']],
            [['referidos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Referidos::className(), 'targetAttribute' => ['referidos_id' => 'referidos_id']],
            [['urna_id'], 'exist', 'skipOnError' => true, 'targetClass' => Urnas::className(), 'targetAttribute' => ['urna_id' => 'urna_id']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipos::className(), 'targetAttribute' => ['id_tipo' => 'id_tipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recepcion_id' => 'N° Recepción',
            'mascotas_id'=>'Codigo de Mascota',
            'referidos_id' => '',
            'mascotas_fdef' => 'Fecha de Defunción',
            'devolucion_id' => 'Devolucion de Restos',
            'planes_id' => 'Plan de Hidrólisis Alcalina',
            'recepcion_fecha' => 'Recepcion',
            'fecha_programada' => 'Fecha Programada',
            'hora_programada' => '',
            'procesos_id'=>'Proceso N°',
            'cod_registro'=> 'Cód. de Registro'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /* */
    public function getUrnas()
    {
        return $this->hasOne(Urnas::className(), ['urna_id' => 'urna_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMascotas()
    {
        return $this->hasOne(Mascotas::className(), ['mascotas_id' => 'mascotas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferidos()
    {
        return $this->hasOne(Referidos::className(), ['referidos_id' => 'referidos_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipos()
    {
        return $this->hasOne(Tipos::className(), ['id_tipo' => 'id_tipo']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesos()
    {
        return $this->hasMany(Procesos::className(), ['mascotas_id' => 'mascotas_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietarios()
    {
        return $this->hasOne(Propietarios::className(), ['propietarios_id' => 'propietarios_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanes()
    {
        return $this->hasOne(Planes::className(), ['planes_id' => 'planes_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevolucion()
    {
        return $this->hasOne(Devolucion::className(), ['devolucion_id' => 'devolucion_id']);
    }
     public function getSelect()
    {
        return $this->hasOne(Select::className(), ['select_id' => 'select_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcionclinica()
    {
        return $this->hasOne(Recepcionclinica::className(), ['propietarios_id' => 'propietarios_id']);
    }
}
