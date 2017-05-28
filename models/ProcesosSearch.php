<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Procesos;

/**
 * ProcesosSearch represents the model behind the search form about `app\models\Procesos`.
 */
class ProcesosSearch extends Procesos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['procesos_id', 'planes_id', 'mascotas_id', 'propietarios_id', 'referidos_id'], 'integer'],
            [['fecha_ing', 'fecha_serv', 'obs', 'mascotas', 'propietarios', 'planes','referidos'], 'safe'],
            [['procesos_libro', 'procesos_pagina', 'procesos_linea'] ,'string', 'max' => 55],
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
        $query = Procesos::find();
        

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
            'procesos_id' => $this->procesos_id,
            'planes_id' => $this->planes_id,
            'mascotas_id' => $this->mascotas_id,
            'propietarios_id' => $this->propietarios_id,
            'referidos_id' => $this->referidos_id,
            'fecha_ing' => $this->fecha_ing,
            'fecha_serv' => $this->fecha_serv,
            'procesos_libro' => $this->procesos_libro,
            'procesos_pagina' => $this->procesos_pagina,
            'procesos_linea' => $this->procesos_linea,

        ]);

        $query->andFilterWhere(['like', 'obs', $this->obs]);
        $query->andFilterWhere(['like', 'mascotas.mascotas_nombre', $this->mascotas]);
        $query->andFilterWhere(['like', 'propietarios.propietarios_nombre', $this->propietarios]);
        $query->andFilterWhere(['like', 'planes.planes_nombre', $this->planes]);
        $query->andFilterWhere(['like', 'referidos.referidos_nombre', $this->referidos]);


        return $dataProvider;
    }
}
