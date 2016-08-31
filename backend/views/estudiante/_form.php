<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Materia;
/* @var $this yii\web\View */
/* @var $model backend\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODIGO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODIGO_MATERIA')->dropDownList(
    ArrayHelper::map(Materia::find()->all(),'CODIGO_MATERIA', 'DESCRIPCION'),
    ['prompt'=>'Seleccione la materia..']
    ) 
    ?>


    <!--?php
    $materias =  (new \yii\db\Query())->select('CODIGO_MATERIA')->from('MATERIA')->limit(10)->all();
    $rows = (new \yii\db\Query())->select('descripcion')->from('MATERIA')->where(['=','CODIGO_MATERIA', $materias])->limit(10)->all();
    $list = ArrayHelper::map($rows, 'CODIGO_MATERIA', 'descripcion');
    ?>
     <--?= $form->field($model, 'CODIGO_MATERIA')->dropDownList($list,
     ['prompt'=>'Seleccione la  materia..']
     )
     ?>-->

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CIUDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EDAD')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
