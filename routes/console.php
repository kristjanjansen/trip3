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

    $models = collect(Storage::files("resources/js/models"));
    $components = collect(Storage::files("resources/js/components"));
    $components_async = collect(
        Storage::files("resources/js/components_async")
    );

    $c = $components
        ->map(fn($path) => basename($path, ".vue"))
        ->map(
            fn($name) => "        " .
                $name .
                ': typeof import("./components/' .
                $name .
                '.vue").default;'
        )
        ->join("\n");

    $m = $models
        ->map(fn($path) => Storage::get($path))
        ->map(fn($model) => "export " . $model)
        ->join("\n");

    $template = <<<END
import router from "ziggy-js";
import { trans, __ } from "./utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";

declare module "vue" {
    export interface ComponentCustomProperties {
        route: typeof router;
        trans: typeof trans;
        __: typeof __;
    }
    export interface GlobalComponents {
        InertiaLink: InertiaLink;
$c
    }
}

$m;
END;

    Storage::put("/resources/js/models.ts", $template);
});
