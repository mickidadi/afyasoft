<?php

namespace frontend\modules\registration\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Patient;

/**
 * PatientSearch represents the model behind the search form of `common\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * {@inheritdoc}
     */
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $phone_number;
    public function rules()
    {
        return [
            [['patient_id', 'created_by', 'updated_by', 'voided', 'voided_by'], 'integer'],
            [['created_at', 'updated_at', 'date_voided', 'void_reason', 'allergy_status','middleName','firstName','lastName','phone_number','gender'], 'safe'],
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
        $query = Patient::find()->orderby("patient_id DESC");

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
        $query->joinWith("patient");
        // grid filtering conditions
        $query->andFilterWhere([
            'patient_id' => $this->patient_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'voided' => $this->voided,
            'voided_by' => $this->voided_by,
            'date_voided' => $this->date_voided,
        ]);

        $query->andFilterWhere(['like', 'person.given_name',$this->firstName])
              ->andFilterWhere(['like', 'person.family_name',$this->lastName])
              ->andFilterWhere(['like', 'person.middle_name', $this->middleName])
              ->andFilterWhere(['like', 'person.gender',$this->gender])
              ->andFilterWhere(['like', 'person.phone_number', $this->phone_number])
              ->andFilterWhere(['like', 'void_reason', $this->void_reason])
              ->andFilterWhere(['like', 'allergy_status', $this->allergy_status]);

        return $dataProvider;
    }
}
