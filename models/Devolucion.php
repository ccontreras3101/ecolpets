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
class Devolucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'devolucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['devolucion_id'], 'integer'],
            [['devolucion_nombre'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdocs
     */
    public function attributeLabels()
    {
        return [
            'devolucion_id' => '',
            'devolucion_nombre' => 'Devolucion de Restos',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecepcion()
    {
        return $this->hasMany(Recepcion::className(), ['devolucion_id' => 'devolucion_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevolucion()
    {
        return $this->hasMany(Devolucion::className(), ['devolucion_id' => 'devolucion_id']);
    }
}
