<?php
/*
require('../vendor/autoload.php');

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Botman\Botman\Facebook\ElementButton;
use Botman\Botman\Facebook\ButtonTemplate;

$config = [
	'facebook' => [
	  	'token' => 'EAACmh4wqjyQBAGCVhtYeLaduwu2IoVOkcmUrZAZCnoiKGzAmMzzmKbZA9e09CfKjZAOpEtxXA9Qz91zryq3G07faNnIsj8tr6f1Ao7HmPX1WuAGshQPAZCYnLZAzCQidvUmXN8mAeTDmSXBraZBxFZBNQUzn87VbTnV4Qv5MLa0klAZDZD',
		'app_secret' => 'ffc71559a70becfdb0582bd3cbb688a2',
	    'verification'=>'ACCUBOT',
	]

];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.



$botman->hears('Hola', function (BotMan $bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hola soy AccuBot');
    $bot->typesAndWaits(2);
    $bot->reply('¿Como te llamas?');
});

/*$botman->hears('Me llamo {name}', function ($bot, $name) {
	$bot->typesAndWaits(2);
	$bot->reply('¿En que te puedo ayudar '.$name.' ?');
});

$botman->hears('Button', function (Botman $bot) {
    $bot->reply('¿Button?');
	$bot->reply('¿Button2?');
});*/


//$botman->listen();

?>

<!DOCTYPE html>
<html>
<head>
	<title>HOLA</title>
</head>
<body>
<h1>HOLA</h1>
</body>
</html>