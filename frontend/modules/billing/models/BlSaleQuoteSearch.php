<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BlSaleQuote;

/**
 * frontend\modules\billing\models\BlSaleQuoteSearch represents the model behind the search form about `common\models\BlSaleQuote`.
 */
 class BlSaleQuoteSearch extends BlSaleQuote
{
    /**
     * @inheritdoc
     */
    public $firstName;
    public $middleName;
    public $lastName;
    public $phone_number;

    public function rules()
    {
        return [
            [['quote_id', 'patient', 'visit', 'created_by', 'status', 'discounted', 'updated_by'], 'integer'],
            [['total_quote', 'payable_amount'], 'number'],
            [['created_at', 'updated_at', 'uuid','firstName','middleName','lastName','phone_number'], 'safe'],
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
        $query = BlSaleQuote::find()->where("quote_id IN(SELECT `sale_quote` FROM `bl_sale_quote_line` WHERE `status`<>6)")->orderBy("quote_id DESC")->groupBy("patient");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1'); Patient
            return $dataProvider;
        }
        $query->joinWith("patient0");
        $query->joinWith("patient0.patient");
        $query->andFilterWhere([
            'quote_id' => $this->quote_id,
            'patient' => $this->patient,
            'visit' => $this->visit,
            'created_by' => $this->created_by,
            'total_quote' => $this->total_quote,
            'payable_amount' => $this->payable_amount,
            'status' => $this->status,
            'discounted' => $this->discounted,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'person.given_name',$this->firstName])
            ->andFilterWhere(['like', 'person.family_name',$this->lastName])
            ->andFilterWhere(['like', 'person.middle_name', $this->middleName])
            ->andFilterWhere(['like', 'person.phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
