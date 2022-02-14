<?php
namespace common\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;
 

class UUIDBehavior extends Behavior {
    /**
     * Field/Column yang akan diisi UUID
     * Default -> id
     * @var type 
     */
    public $column = 'id';

     
    public function events() {
        return[
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
        ];
    }

    /**
     * set beforeSave() -> UUID data
     */
    public function beforeSave() {
        $this->owner->{$this->column} = $this->owner->getDb()->createCommand("SELECT REPLACE(UUID(),'-','')")->queryScalar();
    }

}
