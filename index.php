<?php

# Принимаем запрос
$data = json_decode(file_get_contents('php://input'), TRUE);
//file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);


//https://api.telegram.org/bot*Токен бота*/setwebhook?url=*ссылка на бота*


// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '5620620072:AAGriRMadgmzXSg3FKpB8psK9caN-HqBAP0');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '99999999');

message_to_telegram('Hello TELEGA!');

function message_to_telegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}