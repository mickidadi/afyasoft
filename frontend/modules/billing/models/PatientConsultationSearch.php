<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\clinical\models\PatientConsultation;

/**
 * frontend\modules\billing\models\PatientConsultationSearch represents the model behind the search form about `frontend\modules\clinical\models\PatientConsultation`.
 */
 class PatientConsultationSearch extends PatientConsultation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_consultation_id', 'visit_id', 'patient_id', 'created_by', 'updated_by'], 'integer'],
            [['comment', 'uuid', 'created_at', 'updated_at'], 'safe'],
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
        $query = PatientConsultation::find();

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
            'patient_consultation_id' => $this->patient_consultation_id,
            'visit_id' => $this->visit_id,
            'patient_id' => $this->patient_id,
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
