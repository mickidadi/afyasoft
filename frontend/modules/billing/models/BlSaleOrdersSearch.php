<?php

namespace frontend\modules\billing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\billing\models\BlSaleOrders;

/**
 * frontend\modules\billing\models\BlSaleOrdersSearch represents the model behind the search form about `frontend\modules\billing\models\BlSaleOrders`.
 */
 class BlSaleOrdersSearch extends BlSaleOrders
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
            [['order_id', 'patient_id', 'visit_id', 'status', 'discounted', 'created_by', 'updated_by'], 'integer'],
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
        $query = BlSaleOrders::find()->where(["status"=>0])->orderBy("order_id DESC");

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
        $query->joinWith("patient.patient");
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'patient_id' => $this->patient_id,
            'visit_id' => $this->visit_id,
            'total_quote' => $this->total_quote,
            'payable_amount' => $this->payable_amount,
            'status' => $this->status,
            'discounted' => $this->discounted,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
        ->andFilterWhere(['like', 'person.given_name',$this->firstName])
        ->andFilterWhere(['like', 'person.family_name',$this->lastName])
        ->andFilterWhere(['like', 'person.middle_name', $this->middleName])
        ->andFilterWhere(['like', 'person.phone_number', $this->phone_number]);

        return $dataProvider;
    }
    public function searchAll($params)
    {
        $query = BlSaleOrders::find()->orderBy("order_id DESC");

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
        $query->joinWith("patient.patient");
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'patient_id' => $this->patient_id,
            'visit_id' => $this->visit_id,
            'total_quote' => $this->total_quote,
            'payable_amount' => $this->payable_amount,
            'status' => $this->status,
            'discounted' => $this->discounted,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
        ->andFilterWhere(['like', 'person.given_name',$this->firstName])
        ->andFilterWhere(['like', 'person.family_name',$this->lastName])
        ->andFilterWhere(['like', 'person.middle_name', $this->middleName])
        ->andFilterWhere(['like', 'person.phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
