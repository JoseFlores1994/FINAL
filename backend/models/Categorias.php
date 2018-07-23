<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id_categoria
 * @property string $nombre_categoria
 * @property string $descripcion_categoria
 * @property string $date_added
 *
 * @property Products[] $products
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_categoria', 'descripcion_categoria', 'date_added'], 'required'],
            [['date_added'], 'safe'],
            [['nombre_categoria', 'descripcion_categoria'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre_categoria' => 'Categoria',
            'descripcion_categoria' => 'Descripción',
            'date_added' => 'Agregado',
            'globalSearch' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id_categoria' => 'id_categoria']);
    }
}
