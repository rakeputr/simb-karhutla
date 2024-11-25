<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use Farhanisty\Vetran\Application;
use Farhanisty\Vetran\Facades\Connection\Connection;
use Farhanisty\Vetran\Facades\Response;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = new Application();

$route = $app->getRoute();

$route->get("simb-karhutla/api/statistik-kebakaran", function() use($app) {
    $connection = Farhanisty\Vetran\Facades\Connection\Connection::getInstance();

    //bikin o queryne disini
    
    $query = "SELECT MONTH(tgl_kejadian) bulan, count(tgl_kejadian) jumlah FROM information GROUP BY  MONTH(tgl_kejadian)";

    $stmt = $connection->query($query);

    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    $app->getResponse()->responseJson()->setBody($results)->setStatus(Farhanisty\Vetran\Facades\Response::OK)->build();
});

function getCountGender($status) {
    $connection = Connection::getInstance();
    $stmt = $connection->query("SELECT COUNT(i.status) active FROM information i WHERE i.status = " . $status);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $result;
}

$route->get("simb-karhutla/api/statistik-gender", function() use($app) {
    $active = getCountGender(1)['active'];
    $inactive = getCountGender(0)['active'];

    $app
    ->getResponse()
    ->responseJson()
    ->setBody([
        'active' => $active,
        'inactive' => $inactive
    ])
    ->setStatus(Response::OK)
    ->build();
});