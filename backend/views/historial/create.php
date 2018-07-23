<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Historial */

$this->title = 'Generar Historial';
$this->params['breadcrumbs'][] = ['label' => 'Historials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
