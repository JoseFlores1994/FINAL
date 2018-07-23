<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Productos;
use backend\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Historial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_producto')->dropDownList(
              ArrayHelper::map(Productos::find()->all(), 'codigo_producto', 'nombre_producto'),
              [
                  'prompt' => 'Selecciona un producto',

              ]
      ); ?> <!-- Se implementa un combo para traer los datos de la tabla productos que hace referencia  -->

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
