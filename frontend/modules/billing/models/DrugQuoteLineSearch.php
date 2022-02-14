<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\billing\models\DrugQuoteLine;

/**
 * frontend\modules\billing\models\DrugQuoteLineSearch represents the model behind the search form about `frontend\modules\billing\models\DrugQuoteLine`.
 */
 class DrugQuoteLineSearch extends DrugQuoteLine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quote_line_id', 'drug_inventory_id', 'as_needed', 'num_refills', 'duration', 'duration_units', 'quantity_units', 'route', 'dose_units', 'frequency'], 'integer'],
            [['dose', 'quantity'], 'number'],
            [['dosing_type', 'as_needed_condition', 'dosing_instructions', 'brand_name', 'dispense_as_written', 'drug_non_coded'], 'safe'],
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
        $query = DrugQuoteLine::find();

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
            'quote_line_id' => $this->quote_line_id,
            'drug_inventory_id' => $this->drug_inventory_id,
            'dose' => $this->dose,
            'as_needed' => $this->as_needed,
            'quantity' => $this->quantity,
            'num_refills' => $this->num_refills,
            'duration' => $this->duration,
            'duration_units' => $this->duration_units,
            'quantity_units' => $this->quantity_units,
            'route' => $this->route,
            'dose_units' => $this->dose_units,
            'frequency' => $this->frequency,
        ]);

        $query->andFilterWhere(['like', 'dosing_type', $this->dosing_type])
            ->andFilterWhere(['like', 'as_needed_condition', $this->as_needed_condition])
            ->andFilterWhere(['like', 'dosing_instructions', $this->dosing_instructions])
            ->andFilterWhere(['like', 'brand_name', $this->brand_name])
            ->andFilterWhere(['like', 'dispense_as_written', $this->dispense_as_written])
            ->andFilterWhere(['like', 'drug_non_coded', $this->drug_non_coded]);

        return $dataProvider;
    }
}
