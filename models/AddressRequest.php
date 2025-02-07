<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address_request".
 *
 * @property int $id
 * @property string|null $dt
 * @property string $name
 * @property string $phone
 */
class AddressRequest extends \yii\db\ActiveRecord
{

    public $address;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt'], 'safe'],
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
            'dt' => 'Dt',
            'name' => Yii::t('app', 'Как вас зовут'),
            'phone' => Yii::t('app', 'Номер телефона или ник в телеграмме'),
        ];
    }

    private function getSocialMediaMessage()
    {
        $message = "Заявка на еще не открытый бассейн\n" .
            "\n" .
            "🗓️ " . date('d.m.Y') . "\n" .
            "🕒 " . date('H:i:s') . "\n" .
            "\n" .
            "👤 " . $this->name . "\n" .
            "📱 " . $this->phone . "\n" .
            "🤿 " . $this->address . "\n";


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
                    'to' => Yii::$app->params['whatsAppGroupId'], // The recipient's WhatsApp number in international format
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
}
