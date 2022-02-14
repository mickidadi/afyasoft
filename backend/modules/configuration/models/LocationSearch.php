<?php

namespace backend\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Location;

/**
 * backend\modules\configuration\models\LocationSearch represents the model behind the search form about `common\models\Location`.
 */
 class LocationSearch extends Location
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'creator', 'retired_by', 'parent_location', 'changed_by'], 'integer'],
            [['name', 'description', 'address1', 'address2', 'city_village', 'state_province', 'postal_code', 'country', 'latitude', 'longitude', 'date_created', 'county_district', 'address3', 'address4', 'address5', 'address6', 'retired', 'date_retired', 'retire_reason', 'uuid', 'date_changed', 'address7', 'address8', 'address9', 'address10', 'address11', 'address12', 'address13', 'address14', 'address15'], 'safe'],
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
        $query = Location::find();

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
            'location_id' => $this->location_id,
            'creator' => $this->creator,
            'date_created' => $this->date_created,
            'retired_by' => $this->retired_by,
            'date_retired' => $this->date_retired,
            'parent_location' => $this->parent_location,
            'changed_by' => $this->changed_by,
            'date_changed' => $this->date_changed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'city_village', $this->city_village])
            ->andFilterWhere(['like', 'state_province', $this->state_province])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'county_district', $this->county_district])
            ->andFilterWhere(['like', 'address3', $this->address3])
            ->andFilterWhere(['like', 'address4', $this->address4])
            ->andFilterWhere(['like', 'address5', $this->address5])
            ->andFilterWhere(['like', 'address6', $this->address6])
            ->andFilterWhere(['like', 'retired', $this->retired])
            ->andFilterWhere(['like', 'retire_reason', $this->retire_reason])
            ->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'address7', $this->address7])
            ->andFilterWhere(['like', 'address8', $this->address8])
            ->andFilterWhere(['like', 'address9', $this->address9])
            ->andFilterWhere(['like', 'address10', $this->address10])
            ->andFilterWhere(['like', 'address11', $this->address11])
            ->andFilterWhere(['like', 'address12', $this->address12])
            ->andFilterWhere(['like', 'address13', $this->address13])
            ->andFilterWhere(['like', 'address14', $this->address14])
            ->andFilterWhere(['like', 'address15', $this->address15]);

        return $dataProvider;
    }
}
