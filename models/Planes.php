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
class Planes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'planes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['planes_id'], 'integer'],
            [['planes_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'planes_id' => '',
            'planes_nombre' => 'Hidrólisis Alcalina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesos()
    {
        return $this->hasMany(Procesos::className(), ['planes_id' => 'planes_id']);
    }
}
