<?php

namespace common\models;

use Yii;
use \common\models\base\Location as BaseLocation;

/**
 * This is the model class for table "location".
 */
class Location extends BaseLocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['creator', 'retired_by', 'parent_location', 'changed_by'], 'integer'],
            [['date_created', 'uuid'], 'required'],
            [['date_created', 'date_retired', 'date_changed'], 'safe'],
            [['name', 'description', 'address1', 'address2', 'city_village', 'state_province', 'county_district', 'address3', 'address4', 'address5', 'address6', 'retire_reason', 'address7', 'address8', 'address9', 'address10', 'address11', 'address12', 'address13', 'address14', 'address15'], 'string', 'max' => 255],
            [['postal_code', 'country', 'latitude', 'longitude'], 'string', 'max' => 50],
            [['retired'], 'string', 'max' => 1],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            
        ]);
    }
    public static function getLocationSet($location_id){
       $model=self::findBySql("SELECT `location_id` as id, `name` FROM `location` WHERE `parent_location`='{$location_id}'")->asArray()->all(); 
       return $model;
    }
	
}
