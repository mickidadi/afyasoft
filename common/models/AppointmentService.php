<?php

namespace common\models;

use Yii;
use \common\models\base\AppointmentService as BaseAppointmentService;

/**
 * This is the model class for table "appointment_service".
 */
class AppointmentService extends BaseAppointmentService
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'date_created', 'creator', 'uuid'], 'required'],
            [['description'], 'string'],
            [['start_time', 'end_time', 'date_created', 'date_changed', 'date_voided'], 'safe'],
            [['location_id', 'speciality_id', 'max_appointments_limit', 'duration_mins', 'creator', 'changed_by', 'voided_by'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 8],
            [['voided'], 'string', 'max' => 4],
            [['void_reason'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 38],
            [['uuid'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
