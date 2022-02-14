<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BlItemPrice;

/**
 * frontend\modules\billing\models\BlItemPriceSearch represents the model behind the search form about `common\models\BlItemPrice`.
 */
 class BlItemPriceSearch extends BlItemPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_price_id', 'price_list_version', 'item', 'service_type', 'payment_category', 'payment_sub_category', 'created_by', 'updated_by', 'retired'], 'integer'],
            [['selling_price'], 'number'],
            [['created_at', 'updated_at', 'uuid'], 'safe'],
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
        $query = BlItemPrice::find();

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
            'item_price_id' => $this->item_price_id,
            'price_list_version' => $this->price_list_version,
            'item' => $this->item,
            'service_type' => $this->service_type,
            'payment_category' => $this->payment_category,
            'payment_sub_category' => $this->payment_sub_category,
            'selling_price' => $this->selling_price,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'retired' => $this->retired,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
