<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procesos".
 *
 * @property integer $procesos_id
 * @property integer $planes_id
 * @property integer $mascotas_id
 * @property integer $propietarios_id
 * @property integer $referidos_id
 * @property string $fecha_ing
 * @property string $fecha_serv
 * @property string $obs
 *
 * @property  $propietarios
 * @property Mascotas $mascotas
 * @property Referidos $referidos
 * @property Planes $planes
 */
class Procesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'procesos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['planes_id', 'mascotas_id', 'propietarios_id', 'referidos_id'], 'integer'],
            [['fecha_ing', 'fecha_serv'], 'safe'],
            [['obs'], 'string', 'max' => 255],
            [['procesos_libro', 'procesos_pagina', 'procesos_linea'],'integer'],
            [['propietarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propietarios::className(), 'targetAttribute' => ['propietarios_id' => 'propietarios_id']],
            [['mascotas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mascotas::className(), 'targetAttribute' => ['mascotas_id' => 'mascotas_id']],
            [['referidos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Referidos::className(), 'targetAttribute' => ['referidos_id' => 'referidos_id']],
            [['planes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Planes::className(), 'targetAttribute' => ['planes_id' => 'planes_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'procesos_id' => 'Proceso N°',
            'planes_id' => 'Hidrodesintegración',
            'mascotas_id' => '',
            'propietarios_id' => '',
            'referidos_id' => '',
            'fecha_ing' => 'Fecha de Recepción',
            'fecha_serv' => 'Fecha del Servicio',
            'obs' => '',
            'procesos_libro'=>'Libro',
            'procesos_pagina'=>'Página',
            'procesos_linea'=>'Linea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietarios()
    {
        return $this->hasOne(Propietarios::className(), ['propietarios_id' => 'propietarios_id']);
    }
    public function getRegistro() 
     { 
         return $this->procesos_libro.','.$this->procesos_pagina.','.$this->procesos_linea; 
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
    public function getPlanes()
    {
        return $this->hasOne(Planes::className(), ['planes_id' => 'planes_id']);
    }

    public function getTipos()
    {
        return $this->hasOne(Planes::className(), ['id_tipo' => 'id_tipo']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasOne(Recepcionclinica::className(), ['recepcion_id' => 'recepcion_id']);
    }
}
