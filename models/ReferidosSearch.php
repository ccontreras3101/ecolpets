<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Referidos;

/**
 * ReferidosSearch represents the model behind the search form about `app\models\Referidos`.
 */
class ReferidosSearch extends Referidos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['referidos_id'], 'integer'],
            [['referidos_nombre', 'referidos_telf', 'referidos_email','referidos_dir', 'referidos_nit', 'referidos_rep', 'referidos_ced'], 'safe'],
            [['cod_registro'],  'string', 'max' => 20],
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
        $query = Referidos::find();

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
            'referidos_id' => $this->referidos_id,
            'referidos_telf' => $this->referidos_telf,
            'referidos_nit' => $this->referidos_nit,
            'referidos_ced' => $this->referidos_ced,
            'cod_registro'=> $this->cod_registro,

        ]);

        $query->andFilterWhere(['like', 'referidos_nombre', $this->referidos_nombre]);
        $query->andFilterWhere(['like', 'referidos_email', $this->referidos_email]);
        $query->andFilterWhere(['like', 'referidos_nit', $this->referidos_nit]);
        $query->andFilterWhere(['like', 'referidos_ced', $this->referidos_ced]);
        $query->andFilterWhere(['like', 'cod_registro', $this->cod_registro]);

        $query->andWhere('referidos_nombre != ""');

        return $dataProvider;
    }
}
