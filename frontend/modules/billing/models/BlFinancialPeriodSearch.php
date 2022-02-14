<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\billing\models\BlFinancialPeriod;

/**
 * frontend\modules\billing\models\BlFinancialPeriodSearch represents the model behind the search form about `frontend\modules\billing\models\BlFinancialPeriod`.
 */
 class BlFinancialPeriodSearch extends BlFinancialPeriod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['period_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name', 'start_date', 'end_date', 'created_at', 'updated_at', 'uuid'], 'safe'],
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
        $query = BlFinancialPeriod::find();

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
            'period_id' => $this->period_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
