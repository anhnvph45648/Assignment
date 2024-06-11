<?php
use Anhnvph45648\Asm\Controllers\Client\AboutController;
use Anhnvph45648\Asm\Controllers\Client\CartController;
use Anhnvph45648\Asm\Controllers\Client\ContactController;
use Anhnvph45648\Asm\Controllers\Client\HomeController;
use Anhnvph45648\Asm\Controllers\Client\LoginController;
use Anhnvph45648\Asm\Controllers\Client\OrderController;
use Anhnvph45648\Asm\Controllers\Client\ProductController;

$router->get('/',               HomeController::class       . '@index');
$router->get('/about',          AboutController::class      . '@index');

$router->get('/contact',        ContactController::class    . '@index');
$router->post('/contact/store', ContactController::class    . '@store');

$router->get('/products',       ProductController::class    . '@index');
$router->get('/products/{id}',  ProductController::class    . '@detail');


$router->get('/login',               LoginController::class    . '@showFormLogin');
$router->post( '/handle-login',     LoginController::class    . '@login');
$router->get( '/logout',            LoginController::class    . '@logout');


$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');

$router->post('order/checkout',     OrderController::class . '@checkout');

