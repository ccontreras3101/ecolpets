<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietarios".
 *
 * @property integer $propietarios_id
 * @property integer $propietarios_doc
 * @property string $propietarios_nombre
 * @property string $propietarios_apellido
 * @property string $propietarios_telf
 * @property string $propietarios_email
 *
 * @property Procesos[] $procesos
 */
class Propietarios extends \yii\db\ActiveRecord
{
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propietarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propietarios_doc', 'propietarios_nombre', 'propietarios_apellido', ], 'required'],
            [['propietarios_nombre', 'propietarios_apellido'], 'string', 'max' => 50],
            [['propietarios_dir'], 'string', 'max' => 250],
            [['propietarios_telf'], 'string', 'max' => 20],
            [['propietarios_email'], 'string', 'max' => 55],
            [['propietarios_doc', 'propietarios_id', 'propietarios_telf', 'propietarios_cel'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'propietarios_id' => 'N° de Propietario',
            'propietarios_doc' => 'Cédula/Nit',
            'propietarios_nombre' => 'Nombres',
            'propietarios_apellido' => 'Apellidos',
            'propietarios_telf' => 'Teléfono',
            'propietarios_email' => 'Email',
            'propietarios_dir' => 'Dirección',
            'propietarios_cel' => 'Celular',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesos()
    {
        return $this->hasMany(Procesos::className(), ['propietarios_id' => 'propietarios_id']);
    }
     public function getPropietarios() 
 { 
     return $this->propietarios_apellido.', '.$this->propietarios_nombre; 
 } 
  public function getPropietarios_id() 
 { 
     return $this->propietarios_id; 
 } 
  public function getPropietarios_doc() 
 { 
     return $this->propietarios_doc; 
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
    public function getRecepcionclinica()
    {
        return $this->hasOne(Recepcionclinica::className(), ['propietarios_id' => 'propietarios_id']);
    }
    
}
