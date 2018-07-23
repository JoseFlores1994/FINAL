<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $codigo_producto
 * @property string $nombre_producto
 * @property string $contenido_neto
 * @property string $date_added
 * @property double $precio_venta
 * @property double $costo
 * @property int $stock
 * @property string $image
 * @property int $id_categoria
 *
 * @property Historial[] $historials
 * @property Categorias $categoria
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_producto', 'nombre_producto', 'contenido_neto', 'date_added', 'precio_venta', 'costo', 'stock', 'image', 'id_categoria'], 'required'],
            [['date_added'], 'safe'],
            [['precio_venta', 'costo'], 'number'],
            [['stock', 'id_categoria'], 'integer'],
            [['codigo_producto'], 'string', 'max' => 20],
            [['nombre_producto'], 'string', 'max' => 255],
            [['file'], 'file'],
            [['contenido_neto'], 'string', 'max' => 40],
            [['image'], 'string', 'max' => 100],
            [['codigo_producto'], 'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['id_categoria' => 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo_producto' => 'Código',
            'nombre_producto' => 'Nombre',
            'contenido_neto' => 'Contenido Neto',
            'date_added' => 'Agregado',
            'precio_venta' => 'Precio Venta',
            'costo' => 'Costo',
            'proSearch' => 'Nombre del producto',
            'catSearch' => 'Categoria',
            'stock' => 'Stock',
            'image' => 'Imagen',
            'file' => 'Logo',
            'id_categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorials()
    {
        return $this->hasMany(Historial::className(), ['codigo_producto' => 'codigo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id_categoria' => 'id_categoria']);
    }
}
