<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // For mysql 5.x compatibility see
        // https://github.com/laravel/framework/issues/33238#issuecomment-758552418

        DB::statement("SET SESSION sql_require_primary_key=0");

        Schema::create("password_resets", function (Blueprint $table) {
            $table
                ->string("email")
                ->index()
                ->primary();
            $table->string("token");
            $table->timestamp("created_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("password_resets");
    }
}
