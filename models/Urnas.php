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
class Urnas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'urnas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['urna_nombre'], 'required'],
            [['urnas_id'], 'integer'],
            [['urna_nombre'], 'string', 'max' => 50],
            [['urnasdescript'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdocs
     */
    public function attributeLabels()
    {
        return [
            'urna_id' => '',
            'urna_nombre' => 'Tipo de Urnas',
            'urna_descript' => 'Descripción de las Urnas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasMany(Recepcionclinica::className(), ['urna_id' => 'urna_id']);
    }
}
