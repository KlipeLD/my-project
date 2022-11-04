<?php

namespace App\Services;

use Illuminate\Http\Request;

class TelegramService
{
    //TODO: refaktoring
    public static function sendContact($message){
        $msn = nl2br(addslashes($message->message));
        $name = $message->name;
        $phone = $message->phone;
        $email = $message->email;
        $company = $message->company;
        $city = $message->city;
        $res2 = self::message_to_telegram("Nowa wiadomość:
Imię: $name
Firm: $company
E-mail: $email
Tel: $phone
Miasto: $city
Message: $msn");
    }

    private static function message_to_telegram($text)
    {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . config( 'private_app.tgToken' ) . '/sendMessage',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => config( 'private_app.tgChatId' ),
                    'text' => $text,
                ),
            )
        );
        curl_exec($ch);
    }
}
