<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meets".
 *
 * @property int|null $id
 * @property string $date
 * @property string $title
 * @property string|null $description
 * @property int $organization_id
 *
 * @property Organization $organization
 */
class Meet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'organization_id'], 'integer'],
            [['date', 'title', 'organization_id'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'title' => 'Title',
            'description' => 'Description',
            'organization_id' => 'Organization',
        ];
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['id' => 'organization_id']);
    }
}
