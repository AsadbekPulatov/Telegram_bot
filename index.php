<?php

include 'Telegram.php';

$telegram = new Telegram('1210681190:AAFpNO1ochbktqThf4vewibUEESigM04oiA');

$chat_id = $telegram->ChatID();
//$chat_id = 1210681190;
$text = $telegram->Text();
$content = array('chat_id' => $chat_id, 'text' => $text);
$telegram->sendMessage($content);
// var_dump($content);
?>