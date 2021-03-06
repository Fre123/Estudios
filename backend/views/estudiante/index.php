<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODIGO',
            'CODIGO_MATERIA',
            'NOMBRE',
            'APELLIDO',
            'CIUDAD',
            // 'EDAD',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
