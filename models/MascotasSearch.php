<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mascotas;

/**
 * MascotasSearch represents the model behind the search form about `app\models\Mascotas`.
 */
class MascotasSearch extends Mascotas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mascotas_tipo','mascotas_raza',],'string', 'max' => 55],
            [['mascotas_id', 'mascotas_peso', 'propietarios_id'], 'integer'],
            [['mascotas_nombre'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Mascotas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'mascotas_id' => $this->mascotas_id,
            'mascotas_peso' => $this->mascotas_peso,
            'mascotas_tipo' => $this->mascotas_tipo,
            'mascotas_raza' => $this->mascotas_raza,
            'propietarios_id' => $this->propietarios_id,
        ]);

        $query->andFilterWhere(['like', 'mascotas_nombre', $this->mascotas_nombre]);

        return $dataProvider;
    }
}
