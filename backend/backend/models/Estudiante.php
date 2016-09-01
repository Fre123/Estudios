<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property string $CODIGO
 * @property string $CODIGO_MATERIA
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $CIUDAD
 * @property integer $EDAD
 *
 * @property Materia $cODIGOMATERIA
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODIGO'], 'required'],
            ['EDAD', 'match','pattern' => '/[^abc]$/',  'message' => 'Solo numeros enteros positivos'],
            [['CODIGO'], 'string', 'max' => 50],
            [['CODIGO_MATERIA', 'NOMBRE', 'APELLIDO', 'CIUDAD'], 'string', 'max' => 40],
            [['CODIGO_MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['CODIGO_MATERIA' => 'CODIGO_MATERIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODIGO' => 'Codigo',
            'CODIGO_MATERIA' => 'Codigo  Materia',
            'NOMBRE' => 'Nombre',
            'APELLIDO' => 'Apellido',
            'CIUDAD' => 'Ciudad',
            'EDAD' => 'Edad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODIGOMATERIA()
    {
        return $this->hasOne(Materia::className(), ['CODIGO_MATERIA' => 'CODIGO_MATERIA']);
    }
}
