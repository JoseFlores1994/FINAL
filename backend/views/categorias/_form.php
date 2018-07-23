<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?> <!-- Llamamos a la variable con el bloque JS -->

    <?= $form->field($model, 'nombre_categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion_categoria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<<JS
$('form#{$model->formName()}').on('beforeSubmit', function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"),
        \$form.serialize()
    ).done(function(result){
         if (result.trim().length > 0) {
            $(\$form).trigger("reset");
            $.pjax.reload({container:'#categoriaGrid'});
         }else {

            $("#message").html(result);
         }
       }).fail(function(){
          console.log("server error");
       });
       return false;
});
JS;
$this->registerJs($script);
 ?>
