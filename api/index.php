<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use Farhanisty\Vetran\Application;

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