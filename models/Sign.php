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

    private function getSocialMediaMessage()
    {
        $message = "Заявка с сайта\n" .
            "\n" .
            "🗓️ " . date('d.m.Y') . "\n" .
            "🕒 " . date('H:i:s') . "\n" .
            "\n" .
            "👤 " . $this->name . "\n" .
            "📱 " . $this->phone . "\n" .
            "🤿 " . $this->getTrainTypeList()[$this->train_type] . "\n";

        if (!empty($this->source)) {
            $message .= "💒 " . Yii::t('app', 'Визит из:', ['source' => $this->source])  . "\n";
        }

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

    public function sendWhatsAppMessage()
    {
        try {
            $message = $this->getSocialMediaMessage();
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://gate.whapi.cloud/messages/text', [
                'timeout' => 5,
                'connect_timeout' => 5,
                'body' => json_encode([
                    'to' => Yii::$app->params['whatsAppPhoneSender'], // The recipient's WhatsApp number in international format
                    'body' => $message // The text message to send
                ]),
                'headers' => [
                    'accept' => 'application/json', // Specify that we expect a JSON response
                    'authorization' => 'Bearer ' . Yii::$app->params['whatsAppApiToken'], // Replace YOUR_TOKEN_HERE with your API tkn
                    'content-type' => 'application/json', // Send data in JSON format
                ],
            ]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Yii::$app->telegram->sendMessage([
                'chat_id' => Yii::$app->params['requestTelegramChatId'],
                'text' => 'Error sending to WhatsApp',
                'parse_mode' => 'HTML'
            ]);
        }
        catch (\GuzzleHttp\Exception\ConnectException $e) {
            Yii::$app->telegram->sendMessage([
                'chat_id' => Yii::$app->params['requestTelegramChatId'],
                'text' => 'Error sending to WhatsApp',
                'parse_mode' => 'HTML'
            ]);
        }
    }

    public function getTrainTypeList()
    {
        return [
            'baby' => Yii::t('app', 'Грудничковое плавание'),
            'kids' => Yii::t('app', 'Мини-группа (детская)'),
            'split' => Yii::t('app', 'Сплит-тренировки (2 человека)'),
            'one' => Yii::t('app', 'Индивидуальная тренировка'),
            'adult' => Yii::t('app', 'Мини-группа (взрослая)'),
        ];
    }
}
