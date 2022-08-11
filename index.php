<?php

include 'Telegram.php';
$telegram = new Telegram('1210681190:AAFpNO1ochbktqThf4vewibUEESigM04oiA');
$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$f = '';
if ($text == '/start') {
    $option = array(
        array($telegram->buildKeyboardButton("🌍 Weather")),
//        array($telegram->buildKeyboardButton("❤️ Love", true, false)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);
    $content = array('chat_id' => $chat_id, 'text' => 'Assalomu alaykum. Botimizga xush kelibsiz!');
    $telegram->sendMessage($content);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => 'Tugmalardan birini tanlang');
    $telegram->sendMessage($content);
} else if ($text == "🌍 Weather") {
    $content = array('chat_id' => $chat_id, 'text' => "Qayerniki kerak");
    $telegram->sendMessage($content);
    $f = $text;
} else {
    $q = $text;
    $key = "a85c63aee77341ee89b50718223004";
    $aqi = "yes";
    $api_url = "http://api.weatherapi.com/v1/current.json?key=" . $key . "&aqi=" . $aqi . "&q=" . $q;
    $data = json_decode(file_get_contents($api_url), true);
    $content = array('chat_id' => $chat_id, 'text' => "Harorat " . $data['current']['temp_c']);
    $telegram->sendMessage($content);
}

?>