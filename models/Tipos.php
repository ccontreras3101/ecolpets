<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos".
 *
 * @property integer $id_tipo
 * @property string $tipo_mascota
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
            [['tipo_mascota'], 'required'],
            [['tipo_mascota'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
            'tipo_mascota' => 'Tipo Mascota',
        ];
    }
}
