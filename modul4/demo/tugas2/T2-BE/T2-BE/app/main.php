<?php

    header("Content-type: application/json;");

    include "E:\DOCUMENTS\KULIAH DHABIT\semester 5\Pemograman Web\mod4\T2-BE\T2-BE\app\Routes\productRoutes.php";

    use app\Routes\productRoutes;

    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $productRoutes = new ProductRoutes;
    $productRoutes->handle($method, $path);
?>