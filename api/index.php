<?php

require __DIR__ . '/../public/index.php';

$app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);