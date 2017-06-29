<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planes".
 *
 * @property integer $select_id
 * @property string $tipo
 *
 * @property Procesos[] $procesos
 */
class Select extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'select';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['select_id'], 'integer'],
            [['tipo'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'select_id' => '',
            'tipo' => '',
        ];
    }

    
}
