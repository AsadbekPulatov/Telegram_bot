<?php

include 'Telegram.php';

$telegram = new Telegram('1210681190:AAFpNO1ochbktqThf4vewibUEESigM04oiA');

$chat_id = $telegram->ChatID();
//$chat_id = 1210681190;
$text = $telegram->Text();

if ($text == '/start'){
    $option = array(
        array($telegram->buildKeyboardButton("button1", false, true)),
        array($telegram->buildKeyboardButton("button2", true, false)),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize = true);
    $content = array('chat_id' => $chat_id, 'text' => 'Assalomu alaykum. Botimizga xush kelibsiz!');
    $telegram->sendMessage($content);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb ,'text' => 'Tugmalardan birini tanlang');
    $telegram->sendMessage($content);

}
//$content = array('chat_id' => $chat_id, 'text' => $text);
//$telegram->sendMessage($content);
?>