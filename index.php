<?php

/*require('vendor/autoload.php');

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
    $bot->reply(ButtonTemplate::create('Do you want to know more about BotMan?')
		->addButton(ElementButton::create('Tell me more')->type('postback')->payload('tellmemore'))
		->addButton(ElementButton::create('Show me the docs')->url('http://botman.io/'))
	);
	$bot->reply('¿Button2?');
    
});


// Start listening
$botman->listen();*/

require('vendor/autoload.php');

use App\Http\Controllers\BotManController;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

//$botman = resolve('botman');

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

$botman->hears('Hola', function ($bot) {
	$bot->typesAndWaits(2);
    $bot->reply('¡Hola!, Soy Accubote');
    $bot->typesAndWaits(2);
    $bot->reply('¿Con quien tengo el gusto?');
});

$botman->hears('Soy {name}', function ($bot, $name) {
	$bot->typesAndWaits(2);
	$bot->reply('¿En que te puedo servir '.$name.' ?');
});

$botman->hears('Muestrame una imagen', function (BotMan $bot) {
    // Create attachment
    //$attachment = new Image('http://lorempixel.com/400/200/');
     $attachment = new Image('https://images.vexels.com/media/users/3/128118/isolated/preview/a2d02eb571483802db8847430207d4fe-icono-de-teclado-plano-by-vexels.png');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});

$botman->fallback(function($bot) {
	$bot->reply('Podrias ser mas especifico. Tal vez te pueda interesar...');
	$botman = Question::create("Claro. ¿En que te puedo ayudar?")
	            ->fallback('Unable to ask question')
	            ->callbackId('ask_reason')
	            ->addButtons([
	                Button::create('Diademas telefonicas')->value('joke'),
	                Button::create('Audifonos')->value('joke'),
	                Button::create('Cotizar')->value('joke'),
	                Button::create('Sitio')->value('https://www.accutone.com.mx'),
	            ]);
});

	 /*$question = Question::create("Claro. ¿En que te puedo ayudar?")
	            ->fallback('Unable to ask question')
	            ->callbackId('ask_reason')
	            ->addButtons([
	                Button::create('Diademas telefonicas')->value('joke'),
	                Button::create('Audifonos')->value('joke'),
	                Button::create('Cotizar')->value('joke'),
	                Button::create('Sitio')->value('https://www.accutone.com.mx'),
	            ]);*/





//------------------$botman->hears('Ayuda', BotManController::class.'@startConversation');

//$botman->hears('Iniciar Platica', BotManController::class.'@iniciarPlatica');

$botman->listen();

?>