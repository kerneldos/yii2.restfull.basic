<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%link}}".
 *
 * @property int $id
 * @property string $url
 * @property string|null $description
 * @property string $hash
 * @property int $counter
 * @property string $created_at
 * @property int $created_by
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string {
        return '{{%link}}';
    }

    public function behaviors(): array {
        return [
            [
                'class'                 => 'yii\behaviors\TimestampBehavior',
                'updatedAtAttribute'    => null,
            ],
            [
                'class'                 => 'yii\behaviors\BlameableBehavior',
                'updatedByAttribute'    => null,
                'defaultValue'          => 0,
            ],
        ];
    }

    public function beforeSave($insert): bool {
        if ($this->isNewRecord) {
            $this->hash = base_convert(time(), 10, 36);
        }

        return parent::beforeSave($insert);
    }

    public function fields() {
        return array_merge(parent::fields(), [
            'short_url' => function() {
                return Url::to(['/site/view', 'hash' => $this->hash], true);
            },
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array {
        return [
            [['url'], 'required'],
            ['url', 'url', 'defaultScheme' => 'http'],
            [['counter', 'created_by'], 'integer'],
            ['counter', 'default', 'value' => 0],
            [['created_at', 'created_by'], 'safe'],
            [['url', 'description', 'hash'], 'string', 'max' => 255],
            [['hash'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'description' => 'Description',
            'hash' => 'Hash',
            'counter' => 'Counter',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
}
