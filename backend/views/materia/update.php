<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Update Materia: ' . $model->CODIGO_MATERIA;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CODIGO_MATERIA, 'url' => ['view', 'id' => $model->CODIGO_MATERIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
