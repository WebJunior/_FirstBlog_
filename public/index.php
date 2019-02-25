<?php
require_once '../vendor/autoload.php';

use DI\ContainerBuilder;
use League\Plates\Engine;
use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;

// homepage , categories, user blogs
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Engine::class => function() {
        return new Engine('../app/views');
    },

    PDO::class => function() {
        return new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME . ';charset=' . CHARSET . ';', USER, PASSWORD);
    },

    QueryFactory::class => function() {
        return new QueryFactory('mysql');
    },

    Auth::class => function($container) {
        return new Auth($container->get('PDO'));
    }

]);
$container = $containerBuilder->build();


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\MainController\MainController','index']);
    $r->addRoute('GET', '/registration', ['App\MainController\MainController','controllerRegistration']);
    $r->addRoute('GET', '/exit', ['App\MainController\MainController','userLogOut']);
    $r->addRoute('GET', '/add_post', ['App\MainController\MainController','controllerShowPageAddPost']);
    $r->addRoute('POST', '/create', ['App\MainController\MainController','controllerAddPost']);
    $r->addRoute('POST', '/login', ['App\MainController\MainController','controllerLogin']);
    $r->addRoute('POST', '/addUserAjax', ['App\MainController\MainController','controllerAjaxRegistrationUser']);
    $r->addRoute('POST', '/add_comment', ['App\MainController\MainController','controllerAddComment']);
    $r->addRoute('GET', '/user/{id:\d+}', ['App\MainController\MainController','controllerGetUserInfo']);
    $r->addRoute('GET', '/blog/{id:\d+}', ['App\MainController\MainController','controllerGetFullBlog']);
    $r->addRoute('GET', '/category/{category:\w+}', ['App\MainController\MainController','controllerShowBlogsFromCategory']);
    $r->addRoute('GET', '/emailverif/selector={selector:.+}&token={token:.+}', ['App\MainController\MainController','controllerEmailVerif']);
    $r->addRoute('GET', '/404', ['App\MainController\MainController','controller404']);
    $r->addRoute('GET', '/page/{num:\d+}', ['App\MainController\MainController','controllerGetMorePosts']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header('Location: 404');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler,$vars);
        break;
}



/*
use App\lib\QueryBuilder\QueryBuilder as QueryBuilder;
use App\lib\Connection\Connection as Connection;


$db = new QueryBuilder(Connection::getConnetection());

$posts = $db->getAllFromTable('posts');

// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');

$test = 'teest';
// Render a template
 echo $templates->render('category_list', ['posts' => $posts],['test' => $test]);
*/
