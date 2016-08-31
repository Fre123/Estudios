<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property string $CODIGO_MATERIA
 * @property string $DESCRIPCION
 *
 * @property Estudiante[] $estudiantes
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODIGO_MATERIA'], 'required'],
            [['CODIGO_MATERIA', 'DESCRIPCION'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODIGO_MATERIA' => 'Codigo  Materia',
            'DESCRIPCION' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['CODIGO_MATERIA' => 'CODIGO_MATERIA']);
    }
}
