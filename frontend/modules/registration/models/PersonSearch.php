<?php

namespace frontend\modules\registration\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Person;

/**
 * PersonSearch represents the model behind the search form of `common\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'birthdate_estimated', 'dead', 'cause_of_death', 'created_by', 'updated_by', 'voided', 'voided_by', 'deathdate_estimated'], 'integer'],
            [['gender', 'birthdate', 'death_date', 'created_at', 'updated_at', 'date_voided', 'void_reason', 'uuid', 'birthtime'], 'safe'],
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
        $query = Person::find();

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
            'person_id' => $this->person_id,
            'birthdate' => $this->birthdate,
            'birthdate_estimated' => $this->birthdate_estimated,
            'dead' => $this->dead,
            'death_date' => $this->death_date,
            'cause_of_death' => $this->cause_of_death,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'voided' => $this->voided,
            'voided_by' => $this->voided_by,
            'date_voided' => $this->date_voided,
            'deathdate_estimated' => $this->deathdate_estimated,
            'birthtime' => $this->birthtime,
        ]);

        $query->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'void_reason', $this->void_reason])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
