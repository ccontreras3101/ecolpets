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
            [['propietarios_doc', 'propietarios_nombre', 'propietarios_apellido', 'propietarios_telf', 'propietarios_email'], 'required'],
            [['propietarios_nombre', 'propietarios_apellido'], 'string', 'max' => 50],
            [['propietarios_telf'], 'string', 'max' => 20],
            [['propietarios_email'], 'string', 'max' => 55],
            [['propietarios_doc', 'propietarios_id'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'propietarios_id' => '',
            'propietarios_doc' => '',
            'propietarios_nombre' => '',
            'propietarios_apellido' => '',
            'propietarios_telf' => '',
            'propietarios_email' => '',
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
 /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasMany(Recepcion::className(), ['id_tipo' => 'id_tipo']);
    }
}
