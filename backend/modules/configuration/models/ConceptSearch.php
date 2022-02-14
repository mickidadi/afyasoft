<?php

namespace backend\modules\configuration\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Concept;

/**
 * ConceptSearch represents the model behind the search form of `common\models\Concept`.
 */
class ConceptSearch extends Concept
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['concept_id', 'retired', 'datatype_id', 'class_id', 'is_set', 'created_by', 'updated_by', 'retired_by'], 'integer'],
            [['concept_name_en', 'concept_name_type', 'short_name', 'description', 'form_text', 'created_at', 'version', 'updated_at', 'date_retired', 'retire_reason', 'uuid'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Concept::find();

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
        $query->andFilterWhere([
            'concept_id' => $this->concept_id,
            'retired' => $this->retired,
            'datatype_id' => $this->datatype_id,
            'class_id' => $this->class_id,
            'is_set' => $this->is_set,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'retired_by' => $this->retired_by,
            'date_retired' => $this->date_retired,
        ]);

        $query->andFilterWhere(['like', 'concept_name_en', $this->concept_name_en])
            ->andFilterWhere(['like', 'concept_name_type', $this->concept_name_type])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'form_text', $this->form_text])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'retire_reason', $this->retire_reason])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
