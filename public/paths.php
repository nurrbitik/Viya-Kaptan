<?php
header('Content-Type: text/plain; charset=utf-8');

$map = [
  'autoload'  => __DIR__ . '/../vendor/autoload.php',
  'bootstrap' => __DIR__ . '/../bootstrap/app.php',
  'env'       => dirname(__DIR__) . '/.env',
];

foreach ($map as $name => $path) {
    echo strtoupper($name) . ': ' . $path . ' => ' . (file_exists($path) ? 'OK' : 'MISSING') . "\n";
}
