<?php

namespace frontend\modules\registration\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PersonName;

/**
 * PersonNameSearch represents the model behind the search form of `common\models\PersonName`.
 */
class PersonNameSearch extends PersonName
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_name_id', 'preferred', 'person_id', 'created_by', 'voided', 'voided_by', 'updated_by'], 'integer'],
            [['prefix', 'given_name', 'middle_name', 'family_name_prefix', 'family_name', 'family_name2', 'family_name_suffix', 'degree', 'created_at', 'date_voided', 'void_reason', 'updated_at', 'uuid'], 'safe'],
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
        $query = PersonName::find();

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
            'person_name_id' => $this->person_name_id,
            'preferred' => $this->preferred,
            'person_id' => $this->person_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'voided' => $this->voided,
            'voided_by' => $this->voided_by,
            'date_voided' => $this->date_voided,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'given_name', $this->given_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'family_name_prefix', $this->family_name_prefix])
            ->andFilterWhere(['like', 'family_name', $this->family_name])
            ->andFilterWhere(['like', 'family_name2', $this->family_name2])
            ->andFilterWhere(['like', 'family_name_suffix', $this->family_name_suffix])
            ->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'void_reason', $this->void_reason])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
