<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp/storage');

$app->handleRequest(Illuminate\Http\Request::capture());