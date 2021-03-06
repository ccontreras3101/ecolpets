<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Devolucion;

/**
 * PlanesSearch represents the model behind the search form about `app\models\Planes`.
 */
class DevolucionSearch extends Devolucion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['devolucion_id'], 'integer'],
            [['devolucion_nombre'], 'string', 'max' => 55],
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
        $query = Devolucion::find();

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
            'devolucion_id' => $this->devolucion_id,
        ]);

        $query->andFilterWhere(['like', 'devolucion_nombre', $this->devolucion_nombre]);

        return $dataProvider;
    }
}
