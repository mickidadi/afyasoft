<?php

namespace frontend\modules\clinical\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\clinical\models\PatientCondition;

/**
 * frontend\modules\clinical\models\PatientDiagnosisSearch represents the model behind the search form about `frontend\modules\clinical\models\PatientCondition`.
 */
 class PatientDiagnosisSearch extends PatientCondition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_diagnosis_id', 'patient_id', 'visit_id', 'concept_id', 'orders', 'certainty', 'status', 'created_by', 'updated_by'], 'integer'],
            [['comment', 'condition_date', 'uuid', 'created_at', 'updated_at'], 'safe'],
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
        $query = PatientCondition::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'patient_diagnosis_id' => $this->patient_diagnosis_id,
            'patient_id' => $this->patient_id,
            'visit_id' => $this->visit_id,
            'concept_id' => $this->concept_id,
            'orders' => $this->orders,
            'certainty' => $this->certainty,
            'condition_date' => $this->condition_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
