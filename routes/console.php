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
use Illuminate\Support\Facades\DB;

Artisan::command("migrate:models", function () {
    DB::table("imageables")
        ->where("imageable_type", "App\Models\Content")
        ->update(["imageable_type" => "App\Models\Content"]);
    DB::table("imageables")
        ->where("imageable_type", "App\Models\User")
        ->update(["imageable_type" => "App\Models\User"]);
    DB::table("viewables")
        ->where("viewable_type", "App\Models\Content")
        ->update(["viewable_type" => "App\Models\Content"]);
});

Artisan::command("generate:types", function () {
    $this->call("types:generate");

    $components = collect(Storage::files("resources/js/components"))
        ->map(fn($path) => basename($path, ".vue"))
        ->map(
            fn($name) => "        " .
                $name .
                ': typeof import("../components/' .
                $name .
                '.vue").default;'
        )
        ->join("\n");

    $componentsAsync = collect(Storage::files("resources/js/components_async"))
        ->map(fn($path) => basename($path, ".vue"))
        ->map(
            fn($name) => "        " .
                $name .
                ': typeof import("../components_async/' .
                $name .
                '.vue").default;'
        )
        ->join("\n");

    $models = collect(Storage::files("resources/js/models"))
        ->map(fn($path) => Storage::get($path))
        ->map(fn($model) => "export " . $model)
        ->join("\n");

    $template = <<<END
import router from "ziggy-js";
import { trans, __, formatContent, formatDate, formatAgo } from "../utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";

declare module "vue" {
    export interface ComponentCustomProperties {
        route: typeof router;
        trans: typeof trans;
        __: typeof __;
        formatContent: typeof formatContent;
        formatDate: typeof formatDate;
    }
    export interface GlobalComponents {
        InertiaLink: InertiaLink;
$components

$componentsAsync
    }
}

$models
END;

    Storage::put("/resources/js/types/index.ts", $template);
    Storage::deleteDirectory("/resources/js/models");
});
