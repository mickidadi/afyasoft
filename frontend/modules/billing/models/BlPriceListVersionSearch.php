<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\billing\models\BlPriceListVersion;

/**
 * frontend\modules\billing\models\BlPriceListVersionSearch represents the model behind the search form about `frontend\modules\billing\models\BlPriceListVersion`.
 */
 class BlPriceListVersionSearch extends BlPriceListVersion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'financial_period_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['version_name', 'created_at', 'updated_at', 'uuid'], 'safe'],
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
        $query = BlPriceListVersion::find();

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
            'id' => $this->id,
            'financial_period_id' => $this->financial_period_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'version_name', $this->version_name])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
