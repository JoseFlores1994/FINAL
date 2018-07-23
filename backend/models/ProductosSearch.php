<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productos;

/**
 * ProductosSearch represents the model behind the search form of `backend\models\Productos`.
 */
class ProductosSearch extends Productos
{
    /**
     * {@inheritdoc}
     */
    public $proSearch; //Declaramos una variable para filtrar.
    public $catSearch;

    public function rules()
    {
        return [
            [['codigo_producto', 'nombre_producto', 'id_categoria', 'proSearch', 'catSearch', 'date_added', 'image'], 'safe'],
            [['precio_venta', 'costo'], 'number'],
            [['stock'], 'integer'],
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
        $query = Productos::find();

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

        $query->joinWith('categoria');

        $query->orFilterWhere(['like', 'nombre_producto', $this->proSearch])
              ->orFilterWhere(['like', 'nombre_categoria', $this->catSearch]);


        return $dataProvider;
    }
}
