<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property string $CODIGO_MATERIA
 * @property string $CODIGO
 * @property string $DESCRIPCION
 *
 * @property Estudiante $cODIGO
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
            [['CODIGO'], 'string', 'max' => 50],
            [['CODIGO'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['CODIGO' => 'CODIGO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODIGO_MATERIA' => 'Codigo  Materia',
            'CODIGO' => 'Codigo',
            'DESCRIPCION' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODIGO()
    {
        return $this->hasOne(Estudiante::className(), ['CODIGO' => 'CODIGO']);
    }
}
