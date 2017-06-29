<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recepcionclinica;

/**
 * ProcesosSearch represents the model behind the search form about `app\models\Procesos`.
 */
class RecepcionclinicaSearch extends Recepcionclinica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recepcion_id', 'urna_id', 'mascotas_id','propietarios_id',  'referidos_id', 'id_tipo'], 'integer'],
            [['mascotas',  'urnas','referidos','recepcion_fecha', 'tipos','propietarios'], 'safe'],
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
        $query = Recepcionclinica::find();
        

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
            'recepcion_id' => $this->recepcion_id,
            'urna_id' => $this->urna_id,
            'id_tipo' => $this->id_tipo,
            'mascotas_id' => $this->mascotas_id,
            'propietarios_id' => $this->propietarios_id,
            'referidos_id' => $this->referidos_id,
            'devolucion_id' => $this->devolucion_id,
            'planes_id' => $this->planes_id,
            'recepcion_fecha' => $this->recepcion_fecha,
            'cod_registro' => $this->cod_registro,

        ]);
        $query->andFilterWhere(['like', 'mascotas.mascotas_nombre', $this->mascotas]);
        $query->andFilterWhere(['like', 'propietarios.propietarios_nombre', $this->propietarios]);
        $query->andFilterWhere(['like', 'urnas.urna_nombre', $this->urnas]);
        $query->andFilterWhere(['like', 'referidos.referidos_nombre', $this->referidos]);
        $query->andFilterWhere(['like', 'tipos.tipo_mascota', $this->tipos]);
        $query->andFilterWhere(['like', 'procesos.mascotas_id', $this->procesos]);

        return $dataProvider;
    }
}
