<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container["PDO"] = function ($c) {
    $dsn = 'mysql:dbname=pompier;host=127.0.0.1';
    $user = 'root';
    $password = 'root';
    $pdo = new \PDO($dsn, $user, $password);

    return $pdo;
};

$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'), $c);
};

$container[App\Action\PresencesAction::class] = function ($c) {
    return new App\Action\PresencesAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\AddPompierAction::class] = function ($c) {
    return new App\Action\AddPompierAction($c->get('view'), $c->get('logger'), $c);
};

$container[App\Action\DeletePompierAction::class] = function ($c) {
    return new App\Action\DeletePompierAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\HistoriqueAction::class] = function ($c) {
    return new App\Action\HistoriqueAction($c->get('view'), $c->get('logger'));
};

$container[App\Model\Requester::class] = function ($c) {
    $pdo = $c["PDO"];
    return new App\Model\Requester($pdo);
};

$container[App\Model\AddPompierAction::class] = function ($c) {
    return new App\Model\AddPompierAction($c->get('view'), $c->get('logger'), $c);
};

$container[App\Model\ModPompierAction::class] = function ($c) {
    return new App\Model\ModPompierAction($c->get('view'), $c->get('logger'), $c);
};
