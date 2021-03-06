<?php
/**
 * @author: Jonty Sponselee <jsponselee@student.scalda.nl>
 * @since: 9/9/2018
 */
declare(strict_types = 1);

// Share: Use this instance when injecting
// Define: Define the parameters of the class, use ":" when not using class names (or you can use the order of the construct).
// Make: Create the object.
// Alias: Inject instance of "object"(alias) when type-hinted with "interface"(original)

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);


$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->alias('RinB\Template\Renderer', 'RinB\Template\MustacheRenderer');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/public/templates', [
            'extension' => '.html',
        ]),
    ],
]);

$injector->define('RinB\Page\FilePageReader', [
    ':pageFolder' => dirname(__DIR__) . '/public/pages',
]);
$injector->alias('RinB\Page\PageReader', 'RinB\Page\FilePageReader');
$injector->share('RinB\Page\FilePageReader');

return $injector;