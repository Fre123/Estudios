<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Materia;

/**
 * MateriaSearch represents the model behind the search form about `backend\models\Materia`.
 */
class MateriaSearch extends Materia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODIGO_MATERIA', 'CODIGO', 'DESCRIPCION'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Materia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'CODIGO_MATERIA', $this->CODIGO_MATERIA])
            ->andFilterWhere(['like', 'CODIGO', $this->CODIGO])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION]);

        return $dataProvider;
    }
}
