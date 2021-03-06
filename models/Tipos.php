<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planes".
 *
 * @property integer $planes_id
 * @property string $planes_nombre
 *
 * @property Procesos[] $procesos
 */
class Tipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo'], 'integer'],
            [['tipo_mascota'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdocs
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => '',
            'tipo_mascota' => 'Tipo de Mascota',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasMany(Recepcion::className(), ['id_tipo' => 'id_tipo']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipos()
    {
        return $this->hasMany(Devolucion::className(), ['id_tipo' => 'id_tipo']);
    }
}
