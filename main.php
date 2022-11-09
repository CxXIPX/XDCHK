<?php


include __DIR__."/config/config.php";
include __DIR__."/config/variables.php";
include __DIR__."/functions/bot.php";
include __DIR__."/functions/functions.php";
include __DIR__."/functions/db.php";


date_default_timezone_set($config['timeZone']);


////Modules
include __DIR__."/modules/admin.php";
include __DIR__."/modules/binlookup.php";

include __DIR__."/modules/checker/ss.php";
include __DIR__."/modules/checker/schk.php";
include __DIR__."/modules/checker/sm.php";



//////////////===[START]===//////////////

if(strpos($message, "/start") === 0){
if(!isBanned($userId) && !isMuted($userId)){

  if($userId == $config['adminID']){
    $messagesec = "<b>Type /admin to know admin commands</b>";
  }

    addUser($userId);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<b>Hello @$username,

Type /cmds to know all my commands!</b>

$messagesec",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id
        
    ]);
  }
}

//////////////===[CMDS]===//////////////

if(strpos($message, "/cmds") === 0 || strpos($message, "!cmds") === 0){

  if(!isBanned($userId) && !isMuted($userId)){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>Which commands would you like to check?</b>
      <br>
    <b>━━CC Checker Gates━━</b>
  
<b>/tx | !tx - Stripe [Auth]</b>
<b>/txl | !txl - Stripe [Merchant]</b>

<b>ϟ Join <a href='t.me/Superhellv'>Superhellv</a></b>
",
    'parse_mode'=>'html',
    'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"💳 CC Checker Gates",'callback_data'=>"checkergates"]],[['text'=>"🛠 Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  }
  

  
  

?>