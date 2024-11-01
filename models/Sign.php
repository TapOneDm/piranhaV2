<?php

namespace app\models;

use Yii;
use DateTimeZone;

/**
 * This is the model class for table "sign".
 *
 * @property int $id
 * @property string|null $dt
 * @property string $name
 * @property string $phone
 * @property string $train_type
 * @property string $source
 */
class Sign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt'], 'safe'],
            [['name', 'phone', 'train_type'], 'required'],
            [['train_type', 'source'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt' => 'Dt',
            'name' => Yii::t('app', 'Как вас зовут'),
            'phone' => Yii::t('app', 'Номер телефона или ник в телеграмме'),
            'train_type' => Yii::t('app', 'Тип тренировки'),
            'source' => 'Visitor',
        ];
    }

    public function sendTelegramMessage() {
        $message =
            "Заявка с сайта\n" .
            "\n" .
            "🗓️ " . date('d.m.Y') . "\n" .
            "🕒 " . date('H:i:s') . "\n" .
            "\n" .
            "👤 " . $this->name . "\n" .
            "📱 " . $this->phone . "\n" .
            "🤿 " . $this->getTrainTypeList()[$this->train_type] . "\n";

            if (!empty($this->source)) {
                $message .= "💒 " . Yii::t('app', 'Визит из:', ['source' => $this->source]) . "\n";
            }


        Yii::$app->telegram->sendMessage([
            'chat_id' => Yii::$app->params['requestTelegramChatId'],
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }

    public function getTrainTypeList()
    {
        return [
            'kids' => Yii::t('app', 'Мини-группа (детская)'),
            'split' => Yii::t('app', 'Сплит-тренировки (2 человека)'),
            'one' => Yii::t('app', 'Индивидуальная тренировка'),
            'adult' => Yii::t('app', 'Мини-группа (взрослая)'),
        ];
    }
}
