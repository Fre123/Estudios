<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property string $CODIGO
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $CIUDAD
 * @property integer $EDAD
 *
 * @property Materia[] $materias
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
            [['EDAD'], 'integer'],
            [['CODIGO'], 'string', 'max' => 50],
            [['NOMBRE', 'APELLIDO', 'CIUDAD'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODIGO' => 'Codigo',
            'NOMBRE' => 'Nombre',
            'APELLIDO' => 'Apellido',
            'CIUDAD' => 'Ciudad',
            'EDAD' => 'Edad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::className(), ['CODIGO' => 'CODIGO']);
    }
}
