<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referidos".
 *
 * @property integer $referidos_id
 * @property string $referidos_nombre
 * @property string $referidos_telf
 * @property string $referidos_email
 *
 * @property Procesos[] $procesos
 */
class Referidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['referidos_nombre', 'referidos_email','referidos_dir',  'referidos_rep'], 'string', 'max' => 50],
            [['referidos_nit','referidos_ced'], 'integer'],
            [['referidos_telf','cod_registro'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'referidos_id' => '',
            'referidos_nombre' => 'Nombre',
            'referidos_telf' => 'Teléfono',
            'referidos_email' => 'Email',
            'referidos_dir' => 'Dirección', 
            'referidos_nit' => 'Nit', 
            'referidos_rep' => 'Representante Legal', 
            'referidos_ced' => 'Cedula/Nit Representante',
            'cod_registro'=>'Código Registro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesos()
    {
        return $this->hasMany(Procesos::className(), ['referidos_id' => 'referidos_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasMany(Recepcion::className(), ['id_tipo' => 'id_tipo']);
    }
}
