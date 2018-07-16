<?php


require('vendor/autoload.php');

use App\Http\Controllers\BotManController;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

//$botman = resolve('botman');

$config = [
	'facebook' => [
	  	'token' => 'EAADQLGhaeSkBACnkeNiZC03feZB2EhZC9WMEZCXkIyuCjOUjuWk010wQG0SDuReNjXm8ea6OTbIzDeglhfk6UFMZAwvdubyyTZAmm6PYRlZAhNpMIBIsPNdHlkZCpZBxHyEoZAOreJM3cEroiZCaNoHqTVy0vZCWKzdq0Gf9wBsf1BhhNAZDZD',
		'app_secret' => '741f3b8f86eea022e6861534e15f7704',
	    'verification'=>'botmanACC',
	]

];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance

$botman = BotManFactory::create($config);

$botman->hears('.*(Hi|Hello|Hola).*', function ($bot) {
	$bot->typesAndWaits(2);
    $bot->reply('¡Hola!, Soy Accubot :D ');
    $bot->typesAndWaits(2);
    $bot->reply('¿En que te puedo ayudar?');
});

$botman->hears('.*(Gracias|Ok).*', function ($bot) {
	$bot->typesAndWaits(2);
    $bot->reply('Ha sido un placer :D. Escribe "ayuda" para mostrar opciones de interes. ');
});


$botman->hears('.*(Soy {name}|Me llamo {name}).*', function ($bot, $name) {
	$bot->typesAndWaits(2);
	$bot->reply('¿En que te puedo ayudar '.$name.' ? ');
});

$botman->fallback(function($bot) {
	$bot->reply('Podrias ser mas especifico. Escribe "Ayuda" para mas opciones');
});


$botman->hears('Promocion', function (BotMan $bot) {
    // Create attachment
    //$attachment = new Image('http://lorempixel.com/400/200/');
     $attachment = new Image('http://accutone-usa.com/wp-content/uploads/2016/05/610-B.jpg');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});


$botman->hears('.*(Ubicacion|¿En donde estan?|Direccion|Dirección|Donde estan?|Donde te encuentras?).*', function ($bot) {
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('Estamos ubicados justo aqui :D : https://www.google.com.mx/maps/place/Accutone+M%C3%A9xico/@20.606539,-100.378297,15z/data=!4m5!3m4!1s0x0:0xc8c93aa69861bf13!8m2!3d20.606539!4d-100.378297')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});

$botman->hears('.*(Jabra|Plantronics|Logitech).*', function ($bot) {
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('No vendemos esa marca :O, pero puedes encontrar tu mejor opcion en: https://www.accutone.com.mx, donde te puede atender mi compañera Humana por medio del chat :).')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});

$botman->hears('.*(PWB|PWM|AD2|AD5|ADLEXUS|UCM|UCB|USB|USM|WT|M910|BT|Bluetooth|Cable|Laptop|Computadora|Ordenador|Callcenter|inalambrica|alambrica|Precio).*', function ($bot) {
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('Puedes consultar tu mejor opción, precio y disponibilidad en nuestro sitio web: https://www.accutone.com.mx, mi compañera humana te puede atender en el chat y resolver tus dudas. :).')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});

$botman->hears('.*(Sitio|Pagina web|Página|Pagina).*', function ($bot) {
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('https://www.accutone.com.mx')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});

$botman->hears('.*(Cotizar|Pedir|Pedido|Comprar|Cotizacion|Cotización).*', function ($bot) {
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('Aqui puedes realizar tu cotización: https://www.accutone.com.mx/que-diadema-elegir')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});

$botman->hears('Audifonos', function ($bot) {
	// Create attachment
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('Este es nuestro catalogo :D https://www.dropbox.com/s/tnnusjir0rf61rn/Accutone_Catalogo_de_Audifonos.pdf?dl=0')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});

$botman->hears('.*(Soporte|soporte|soporte técnico|soporte tecnico|support|garantia|ticket).*', function ($bot) {
//$botman->hears('Soporte', function ($bot) {
	// Create attachment
	$attachment = new Location(20.606539, -100.378297, [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('Puedes ingresar al siguiente link para ir a soporte: https://www.accutone.com.mx/soporte-tecnico')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});


/*$botman->hears('Audifonos', function ($bot) {
	// Create attachment
	$attachment = new File('https://www.clinicalascondes.cl/Dev_CLC/media/Imagenes/PDF%20revista%20m%C3%A9dica/2003/1%20enero/Audifonos-9.pdf', [
	    'custom_payload' => true,
	]);

	// Build message object
	$message = OutgoingMessage::create('Este es nuestro Catalogo ')
	            ->withAttachment($attachment);

	// Reply message object
	$bot->reply($message);

});*/





$botman->hears('Ayuda', BotManController::class.'@startConversation');

//$botman->hears('Iniciar Platica', BotManController::class.'@iniciarPlatica');

$botman->listen();

?>