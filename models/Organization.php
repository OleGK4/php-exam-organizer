<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 *
 * @property Meet[] $meets
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'address'], 'required'],
            [['name', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }

    /**
     * Gets query for [[Meets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeets()
    {
        return $this->hasMany(Meet::class, ['organization_id' => 'id']);
    }
}
