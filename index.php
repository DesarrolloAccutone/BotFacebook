<?php

require('vendor/autoload.php');

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Botman\Botman\Facebook\ElementButton;
use Botman\Botman\Facebook\ButtonTemplate;

$config = [
	'facebook' => [
	  	'token' => 'EAADQLGhaeSkBAC7FOgeyjVL6X1mexDlo12G9TXGNMFckJx375eTtlVIyaQAEdsxpjXVpjNXiZCGEe3tjfuNdm3Qa7abbvSaPEDsG8VDibdqJezeCAaaND5uYWX0w4cpWY03z2SuIfL90KZAM0WQyiZCfvyTobvgfSjZA1Kip1wZDZD',
		'app_secret' => '741f3b8f86eea022e6861534e15f7704',
	    'verification'=>'botmanACC',
	]

];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance

$botman = BotManFactory::create($config);

/*$botman->hears('button', function (BotMan $bot) {
	$bot->typesAndWaits(2);
	$bot->reply(ButtonTemplate::create('Do you want to know more about BotMan?')
	->addButton(ElementButton::create('Tell me more')->type('postback')->payload('tellmemore'))
	->addButton(ElementButton::create('Show me the docs')->url('http://botman.io/'))
	);
});*/
// Give the bot something to listen for.
$botman->hears('Hola', function (BotMan $bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hola soy AccuBot');
    $bot->typesAndWaits(2);
    $bot->reply('¿Como te llamas?');
});

$botman->hears('Me llamo {name}', function ($bot, $name) {
	$bot->typesAndWaits(2);
	$bot->reply('¿En que te puedo ayudar '.$name.' ?');
});

$botman->hears('Button', function (Botman $bot) {
    $bot->reply('¿Button?');
    /*$bot->reply(ButtonTemplate::create('Do you want to know more about BotMan?')
		->addButton(ElementButton::create('Tell me more')->type('postback')->payload('tellmemore'))
		->addButton(ElementButton::create('Show me the docs')->url('http://botman.io/'))
	);*/
	$bot->reply('¿Button2?');
    /*$bot->reply(ListTemplate::create()
	->useCompactView()
	->addGlobalButton(ElementButton::create('view more')->url('http://test.at'))
	->addElement(
		Element::create('BotMan Documentation')
			->subtitle('All about BotMan')
			->image('http://botman.io/img/botman-body.png')
			->addButton(ElementButton::create('tell me more')
				->payload('tellmemore')->type('postback'))
	)
	->addElement(
		Element::create('BotMan Laravel Starter')
			->subtitle('This is the best way to start with Laravel and BotMan')
			->image('http://botman.io/img/botman-body.png')
			->addButton(ElementButton::create('visit')
				->url('https://github.com/mpociot/botman-laravel-starter')
			)
	)
	);*/
});

//$botman->hears('Start', BotManController::class.'@startConversation');

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*$botman->hears('Me llamo {name}', function ($bot, $name) {
	$bot->reply('¿En que te puedo ayudar '.$name.' ?');
});*/

/*$botman->hears('Ayuda', function ($bot) {
    $bot->reply(ButtonTemplate::create('Do you want to know more about BotMan?')
		->addButton(ElementButton::create('Tell me more')->type('postback')->payload('tellmemore'))
		->addButton(ElementButton::create('Show me the docs')->url('http://botman.io/'))
);
});*/


/*$botman->fallback(function($bot) {
	$bot->reply('Podrias ser mas especifico...');
*/

// Start listening
$botman->listen();

?>