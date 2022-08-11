<?php

include 'Telegram.php';
$telegram = new Telegram('1210681190:AAFpNO1ochbktqThf4vewibUEESigM04oiA');
$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$f = '';
if ($text == '/start') {
    showMenu();
} else if ($text == "🌍 Weather") {
    $content = array('chat_id' => $chat_id, 'text' => "Qayerniki kerak");
    $telegram->sendMessage($content);
    $f = $text;
} else {
    showWeather();
}

function showMenu()
{
    global $telegram, $chat_id;
    $option = array(
        array($telegram->buildKeyboardButton("🌍 Weather")),
//        array($telegram->buildKeyboardButton("❤️ Love", true, false)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);
    $content = array('chat_id' => $chat_id, 'text' => 'Assalomu alaykum. Botimizga xush kelibsiz!');
    $telegram->sendMessage($content);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => 'Tugmalardan birini tanlang');
    $telegram->sendMessage($content);
}

function showWeather()
{
    global $telegram, $text, $chat_id;
    $q = $text;
    $key = "a85c63aee77341ee89b50718223004";
    $aqi = "yes";
    $api_url = "http://api.weatherapi.com/v1/current.json?key=" . $key . "&aqi=" . $aqi . "&q=" . $q;
    $data = json_decode(file_get_contents($api_url), true);
    $show = "<img src='".$data['current']['condition']['icon']."' ><br>".
            "📍 Name: ".$data['location']['name']."<br>".
            "📍 Region: ".$data['location']['region']."<br>".
            "📍 Country: ".$data['location']['country']."<br>".
            "🌡 Temperature: ".$data['current']['temp_c']."<br>.";
            "🌪 Wind: ".$data['current']['wind_mph']."<br>.";
            "💧 Humidity: ".$data['current']['humidity']."<br>.";
            "🕔 Time: ".$data['current']['last_updated']."<br>";
    $content = array('chat_id' => $chat_id, 'text' => $show);
    $telegram->sendMessage($content);
}

?>