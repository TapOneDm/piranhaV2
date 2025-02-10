<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string|null $dt
 * @property string $phone
 * @property string $comment
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt'], 'safe'],
            [['phone', 'comment'], 'required'],
            [['comment'], 'string'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt' => 'Dt',
            'phone' => Yii::t('app', 'Номер телефона / Telegram / WhatsApp'),
            'comment' => Yii::t('app', 'Вопрос'),
        ];
    }

    private function getSocialMediaMessage()
    {
        $message = "Заявка с сайта\n" .
            "\n" .
            "🗓️ " . date('d.m.Y') . "\n" .
            "🕒 " . date('H:i:s') . "\n" .
            "\n" .
            "📱 " . $this->phone . "\n" .
            "👤 " . $this->comment . "\n";

        return $message;
    }

    public function sendTelegramMessage() {
        $message = $this->getSocialMediaMessage();

        Yii::$app->telegram->sendMessage([
            'chat_id' => Yii::$app->params['requestTelegramChatId'],
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }
}
