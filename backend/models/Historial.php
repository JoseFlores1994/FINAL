<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial".
 *
 * @property int $id_historial
 * @property string $codigo_producto
 * @property int $user_id
 * @property string $fecha
 * @property string $hora
 * @property int $cantidad
 *
 * @property Productos $codigoProducto
 * @property User $user
 */
class Historial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_producto', 'user_id', 'fecha', 'hora', 'cantidad'], 'required'],
            [['cantidad'], 'integer'],
            [['fecha', 'hora'], 'safe'],
            [['codigo_producto'], 'string', 'max' => 20],
            [['user_id'], 'string', 'max' => 40],
            [['codigo_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['codigo_producto' => 'codigo_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_historial' => 'Id Historial',
            'codigo_producto' => 'Producto',
            'user_id' => 'Usuario',
            'hisSearch' => 'Producto',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'cantidad' => 'Cantidad agregada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoProducto()
    {
        return $this->hasOne(Productos::className(), ['codigo_producto' => 'codigo_producto']);
    }

}
