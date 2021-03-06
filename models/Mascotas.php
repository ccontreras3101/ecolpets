<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mascotas".
 *
 * @property integer $mascotas_id
 * @property string $mascotas_nombre
 * @property integer $mascotas_peso
 * @property integer $propietarios_id
 *
 * @property Procesos[] $procesos
 */
class Mascotas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mascotas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['propietarios_id', 'mascotas_edad'], 'integer'],
            [['mascotas_nombre'], 'string', 'max' => 50],
            [['mascotas_fdef'],'safe'],
            [['mascotas_peso'],'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mascotas_id'=>'Codigo de Mascota',
            'mascotas_nombre' => 'Nombre',
            'mascotas_peso' => 'Peso',
            'id_tipo' => 'Tipo',
            'mascotas_raza' => 'Raza',
            'propietarios_id' => 'Propietario',
            'mascotas_fdef' =>'Fecha de Defuncion',
            'mascotas_edad'=>'Edad',
        ];
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
    public function getTipos()
    {
        return $this->hasMany(Tipos::className(), ['id_tipo' => 'id_tipo']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasMany(Recepcion::className(), ['id_tipo' => 'id_tipo']);
    }
}
