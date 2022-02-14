<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $region_id
 * @property string $region_name
 *
 * @property Cases[] $cases
 * @property Clients[] $clients
 * @property District[] $districts
 * @property Education[] $educations
 * @property GenderBased[] $genderBaseds
 * @property Journalist[] $journalists
 * @property ProjectWork[] $projectWorks
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_name'], 'required'],
            [['region_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'region_id' => Yii::t('app', 'Region ID'),
            'region_name' => Yii::t('app', 'Region Name'),
        ];
    }

    /**
     * Gets query for [[Cases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCases()
    {
        return $this->hasMany(Cases::className(), ['regionId' => 'region_id']);
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['regionId' => 'region_id']);
    }

    /**
     * Gets query for [[Districts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['region_id' => 'region_id']);
    }

    /**
     * Gets query for [[Educations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['region_id' => 'region_id']);
    }

    /**
     * Gets query for [[GenderBaseds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenderBaseds()
    {
        return $this->hasMany(GenderBased::className(), ['region_id' => 'region_id']);
    }

    /**
     * Gets query for [[Journalists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournalists()
    {
        return $this->hasMany(Journalist::className(), ['region_id' => 'region_id']);
    }

    /**
     * Gets query for [[ProjectWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectWorks()
    {
        return $this->hasMany(ProjectWork::className(), ['region_id' => 'region_id']);
    }
}
