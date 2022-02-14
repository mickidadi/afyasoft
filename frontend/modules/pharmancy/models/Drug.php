<?php

namespace frontend\modules\pharmancy\models;

use Yii;
use \frontend\modules\pharmancy\models\base\Drug as BaseDrug;

/**
 * This is the model class for table "drug".
 */
class Drug extends BaseDrug
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['concept_id', 'dosage_form', 'route', 'created_by', 'updated_by', 'retired_by'], 'integer'],
            [['maximum_daily_dose', 'minimum_daily_dose'], 'number'],
            [['created_at', 'uuid'], 'required'],
            [['created_at', 'updated_at', 'date_retired'], 'safe'],
            [['name', 'retire_reason', 'strength'], 'string', 'max' => 255],
            [['combination', 'retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
             
        ]);
    }
	
}
