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
            [['mascotas_nombre', 'mascotas_peso','mascotas_tipo','mascotas_raza', 'propietarios_id'], 'required'],
            [['mascotas_peso', 'propietarios_id'], 'integer'],
            [['mascotas_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mascotas_id' => 'Mascotas ID',
            'mascotas_nombre' => 'Mascotas Nombre',
            'mascotas_peso' => 'Mascotas Peso',
            'mascotas_tipo' => '(Canino/Felino/Otro',
            'mascotas_raza' => 'Raza',
            'propietarios_id' => 'Propietarios ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesos()
    {
        return $this->hasMany(Procesos::className(), ['mascotas_id' => 'mascotas_id']);
    }
}
