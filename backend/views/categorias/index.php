<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal; //Importo esta clase para el uso de la ventana modal
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Nueva Categoria', ['value' => Url::to('index.php?r=categorias/create'), 'class' => 'btn btn-success', 'id' => 'modalButton', 'data-pjax' => '0']) ?>
    </p>

    <?php //Se utiliza una ventana modal para mostrar la opción de crear un branch
          Modal::begin([
            'header' => '<h4>Categorias</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
          ]);

          echo "<div id='modalContent'></div>";

          Modal::end();
    ?>

    <?php Pjax::begin(['id'=>'categoriaGrid']); //Llamamos al método ajax para actualizar sin recargar ?>
    <?php echo $this->render('_search', ['model' => $searchModel]);  //Llamamos a la clase Search para la busqueda global ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_categoria',
            'nombre_categoria',
            'descripcion_categoria',
            'date_added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
