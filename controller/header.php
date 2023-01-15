<?php

require 'database/koneksi.php';

$url = $_SERVER['REQUEST_URI'];
$path = explode('/', $url);
$param = $path[count($path) - 1];

$url = query("SELECT * FROM link WHERE short_url = '$param'");

if (!$url && $_SERVER['REQUEST_URI'] != '/') {
    header("Location: 404.php", true, 301);
    exit;
}

if ($_SERVER['REQUEST_URI'] === '/' . $param && $_SERVER['REQUEST_URI'] != '/') {
    header("Location: " . $url[0]["long_url"], true, 301);
    exit;
}

