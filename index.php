<?php

include 'Telegram.php';

$telegram = new Telegram('1210681190:AAFpNO1ochbktqThf4vewibUEESigM04oiA');

$chat_id = $telegram->ChatID();
//$chat_id = 1210681190;
$text = $telegram->Text();

if ($text == '/start'){
    $option = array(
        array($telegram->buildKeyboardButton("button1")),
        array($telegram->buildKeyboardButton("button2", $request_contact = true)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize = true);
    $content = array('chat_id' => $chat_id, 'text' => 'Assalomu alaykum. Botimizga xush kelibsiz!');
    $telegram->sendMessage($content);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb ,'text' => 'Tugmalardan birini tanlang');
    $telegram->sendMessage($content);

}
//$content = array('chat_id' => $chat_id, 'text' => $text);
//$telegram->sendMessage($content);
// var_dump($content);
?>