<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistorialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historial';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historial-index">

    <h1><?= Html::encode('Historial') ?></h1>


    <p>
        <?= Html::button('Create Historial', ['value' => Url::to('index.php?r=historial/create'), 'class' => 'btn btn-success', 'id' => 'modalButton', 'data-pjax' => '0']) ?>
    </p>

    <?php //Se utiliza una ventana modal para mostrar la opción de crear un historial
          Modal::begin([
            'header' => '<h4>Historial</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
          ]);

          echo "<div id='modalContent'></div>";

          Modal::end();
    ?>

    <?php Pjax::begin(); ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_historial',
            //'codigo_producto',
            [
               'attribute' => 'codigo_producto',
               'value' => 'codigoProducto.nombre_producto', //Enlaza a los elementos del campo nombre de la tabla productos
            ],
            'user_id',
            'fecha',
            'hora',
            'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
