<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Historial;

/**
 * HistorialSearch represents the model behind the search form of `backend\models\Historial`.
 */
class HistorialSearch extends Historial
{
    /**
     * {@inheritdoc}
     */
    public $hisSearch;

    public function rules()
    {
        return [
            [['id_historial', 'cantidad'], 'integer'],
            [['codigo_producto', 'hisSearch', 'user_id', 'fecha', 'hora'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Historial::find();

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

        $query->joinWith('codigoProducto');

        $query->orFilterWhere(['like', 'nombre_producto', $this->hisSearch]);

        return $dataProvider;
    }
}
