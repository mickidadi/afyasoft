<?php

namespace common\models;

use Yii;
use \common\models\base\BlQuoteStatusCode as BaseBlQuoteStatusCode;

/**
 * This is the model class for table "bl_quote_status_code".
 */
class BlQuoteStatusCode extends BaseBlQuoteStatusCode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'quote_type', 'creator', 'date_created', 'uuid'], 'required'],
            [['creator', 'changed_by', 'retired'], 'integer'],
            [['date_created', 'date_changed'], 'safe'],
            [['name'], 'string', 'max' => 80],
            [['quote_type'], 'string', 'max' => 10],
            [['uuid'], 'string', 'max' => 58],
            [['uuid'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
