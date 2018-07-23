<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categorias;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin([
      'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'codigo_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contenido_neto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(
              ArrayHelper::map(Categorias::find()->all(), 'id_categoria', 'nombre_categoria'),
              [
                  'prompt' => 'Selecciona una categoria',
                  'onchange' => '
                      $.post( "index.php?r=categorias/lists&id='.'"+$(this).val(), function( data ){
                         $( "select#productos-categorias-id_categoria" ).html( data );
                      });'
              ]
      ); ?> <!-- Se implementa un combo para traer los datos de la tabla categorias que hace referencia  -->

    <?= $form->field($model, 'precio_venta')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
