<?php

$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$dbUser = $_ENV['DB_USER'];
$dbPass = $_ENV['DB_PASS'];

$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
