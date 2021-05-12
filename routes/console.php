<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

use Illuminate\Support\Facades\Storage;

Artisan::command("generate:types", function () {
    $this->call("types:generate");
    $models = collect(Storage::allFiles("resources/js/models"));
    $f = $models
        ->map(fn($path) => Storage::get($path))
        ->map(fn($model) => "export " . $model)
        ->join("\n");
    Storage::put("/resources/js/models.ts", $f);
});
