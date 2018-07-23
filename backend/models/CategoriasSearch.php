<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Categorias;

/**
 * CategoriasSearch represents the model behind the search form of `backend\models\Categorias`.
 */
class CategoriasSearch extends Categorias
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch; //Declaramos una variable para filtrar.

    public function rules()
    {
        return [
            [['id_categoria'], 'integer'],
            [['nombre_categoria', 'globalSearch', 'descripcion_categoria', 'date_added'], 'safe'],
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
        $query = Categorias::find();

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


        $query->orFilterWhere(['like', 'nombre_categoria', $this->globalSearch]); //Establecemos el filtro de busqueda.
            //->andFilterWhere(['like', 'descripcion_categoria', $this->descripcion_categoria]);

        return $dataProvider;
    }
}
