<?php
include "./views/view_header.php";
include "./views/view_index.php";
include "./vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__,".env");
$dotenv->load();