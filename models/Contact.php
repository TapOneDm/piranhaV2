<?php

namespace app\models;

use DateTimeZone;
use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string|null $dt
 * @property string $name
 * @property string $phone
 */
class Contact extends \yii\db\ActiveRecord
{

    const SUCCESS_SENT_FLASH_NAME = 'SENT';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['id'], 'integer'],
            [['dt'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'name' => Yii::$app->language === 'ru' ? 'ФИО' : 'Name',
            'phone' => Yii::$app->language === 'ru' ? 'Номер телефона' : 'Phone',
        ];
    }

    public function sendTelegramMessage() {
        $dt = new \DateTime($this->dt, new DateTimeZone('Europe/Moscow'));
        $message =
            "Заявка с сайта\n" .
            "\n" .
            "🗓️ " . $dt->format('d.m.Y') . "\n" .
            "🕒 " . $dt->format('H:i:s') . "\n" .
            "\n" .
            "👤 " . $this->name . "\n" .
            "📱 " . $this->phone . "\n";

        Yii::$app->telegram->sendMessage([
            'chat_id' => Yii::$app->params['requestTelegramChatId'],
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }

    public static function getFromFieldsFromDb()
    {
        return Common::find()
            ->select(['form_name_field', 'form_name_field_en', 'form_name_field_ge', 'form_phone_field', 'form_phone_field_en', 'form_phone_field_ge'])
            ->asArray()
            ->all();
        }
}
