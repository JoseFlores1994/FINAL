<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Historial */

$this->title = 'Update Historial: ' . $model->id_historial;
$this->params['breadcrumbs'][] = ['label' => 'Historials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_historial, 'url' => ['view', 'id' => $model->id_historial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="historial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
