<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BlSaleQuoteLine;

/**
 * frontend\modules\billing\models\BlSaleQuoteLineSearch represents the model behind the search form about `common\models\BlSaleQuoteLine`.
 */
 class BlSaleQuoteLineSearch extends BlSaleQuoteLine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quote_line_id', 'sale_quote', 'item', 'service_type', 'item_price', 'quantity', 'payment_category', 'payment_sub_category', 'status', 'dose_units', 'duration', 'duration_units', 'route', 'frequency', 'created_by', 'updated_by'], 'integer'],
            [['unit', 'comment', 'created_at', 'updated_at', 'uuid'], 'safe'],
            [['quoted_amount', 'payable_amount', 'dose'], 'number'],
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
        $query = BlSaleQuoteLine::find();

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
            'sale_quote' => $this->sale_quote,
            'item' => $this->item,
            'service_type' => $this->service_type,
            'item_price' => $this->item_price,
            'quantity' => $this->quantity,
            'quoted_amount' => $this->quoted_amount,
            'payable_amount' => $this->payable_amount,
            'payment_category' => $this->payment_category,
            'payment_sub_category' => $this->payment_sub_category,
            'status' => $this->status,
            'dose' => $this->dose,
            'dose_units' => $this->dose_units,
            'duration' => $this->duration,
            'duration_units' => $this->duration_units,
            'route' => $this->route,
            'frequency' => $this->frequency,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
    public function searchclinical($params,$patient_id,$visit_id,$service_type)
    {
        $query = BlSaleQuoteLine::find()->joinWith("saleQuote")->where("bl_sale_quote.patient='{$patient_id}' AND bl_sale_quote.visit='{$visit_id}' AND service_type='{$service_type}'")->orderBy("quote_line_id DESC");

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
            'sale_quote' => $this->sale_quote,
            'item' => $this->item,
            'service_type' => $this->service_type,
            'item_price' => $this->item_price,
            'quantity' => $this->quantity,
            'quoted_amount' => $this->quoted_amount,
            'payable_amount' => $this->payable_amount,
            'payment_category' => $this->payment_category,
            'payment_sub_category' => $this->payment_sub_category,
            'status' => $this->status,
            'dose' => $this->dose,
            'dose_units' => $this->dose_units,
            'duration' => $this->duration,
            'duration_units' => $this->duration_units,
            'route' => $this->route,
            'frequency' => $this->frequency,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
