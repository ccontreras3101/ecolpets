<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Propietarios;

/**
 * PropietariosSearch represents the model behind the search form about `app\models\Propietarios`.
 */
class PropietariosSearch extends Propietarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propietarios_id', 'propietarios_doc'], 'integer'],
            [['propietarios_nombre', 'propietarios_apellido', 'propietarios_telf', 'propietarios_email'], 'safe'],
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
        $query = Propietarios::find();

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
            'propietarios_id' => $this->propietarios_id,
            'propietarios_doc' => $this->propietarios_doc,
        ]);

        $query->andFilterWhere(['like', 'propietarios_nombre', $this->propietarios_nombre])
            ->andFilterWhere(['like', 'propietarios_apellido', $this->propietarios_apellido])
            ->andFilterWhere(['like', 'propietarios_telf', $this->propietarios_telf])
            ->andFilterWhere(['like', 'propietarios_email', $this->propietarios_email]);

        return $dataProvider;
    }
}
