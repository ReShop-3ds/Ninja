<?php
require_once "altorouter.php";
$router = new AltoRouter;
//routes
$router->map('GET|POST', '/ninja/ws/country/[*:ct]', 'pages/country.php');
$router->map('GET|POST', '/ninja/ws/my/session/!open', 'pages/s_open.php');
$router->map('GET|POST', '/ninja/ws/my/account/ctr/!migrate_without_nna', 'pages/null_json.php');
$router->map('GET|POST', '/ninja/ws/my/wishlist/notice', 'pages/wishlist.php');
$router->map('GET|POST', '/ninja/ws/my/balance/current', 'pages/balance.php');
$router->map('GET|POST', '/ninja/ws/my/language', 'pages/language.php');
$router->map('GET|POST', '/ninja/ws/my/wishlist', 'pages/wishlist2.php');
$router->map('GET|POST', '/ninja/ws/my/shared_title_ids', 'pages/titles.php');
$router->map('GET|POST', '/ninja/ws/my/owned_coupons', 'pages/coupons.php');
$router->map('GET|POST', '/ninja/ws/service_hosts', 'pages/sh.php');
$router->map('GET|POST', '/ninja/ws/my/session/!close', 'pages/null.php');
$match = $router->match(urldecode($_SERVER['REQUEST_URI']));
if ($match) {
    foreach ($match['params'] as &$param) {
        ${key($match['params'])} = $param;
    }
    require_once $match['target'];
} else {
    http_response_code(404);
    exit("not found");
}