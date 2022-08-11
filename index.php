<?php

$key = "a85c63aee77341ee89b50718223004";
$aqi = "yes";
//if (isset($_GET['location'])){
//    $q = $_GET['location'];
//} else
    $q = "Pitnak";
$api_url = "http://api.weatherapi.com/v1/current.json?key=".$key."&aqi=".$aqi."&q=".$q;
$data = json_decode(file_get_contents($api_url), true);
//echo "<pre>";
//var_dump($data);
//echo "</pre>";
//$data['current']['temp_c'];
include 'Telegram.php';

$telegram = new Telegram('1210681190:AAFpNO1ochbktqThf4vewibUEESigM04oiA');

$chat_id = $telegram->ChatID();
//$chat_id = 1210681190;
$text = $telegram->Text();

if ($text == '/start'){
    $option = array(
        array($telegram->buildKeyboardButton("🌍 Weather", false, true)),
        array($telegram->buildKeyboardButton("❤️ Love", true, false)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize = true);
    $content = array('chat_id' => $chat_id, 'text' => 'Assalomu alaykum. Botimizga xush kelibsiz!');
    $telegram->sendMessage($content);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb ,'text' => 'Tugmalardan birini tanlang');
    $telegram->sendMessage($content);
}
else if ($text == "🌍 Weather"){
    $content = array('chat_id' => $chat_id,'text' => "Harorat".$data['current']['temp_c']);
    $telegram->sendMessage($content);
}
//$content = array('chat_id' => $chat_id, 'text' => $text);
//$telegram->sendMessage($content);
?>