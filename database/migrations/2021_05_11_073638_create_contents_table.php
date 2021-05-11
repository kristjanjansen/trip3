<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("contents", function (Blueprint $table) {
            $table->id();
            $table
                ->integer("user_id")
                ->unsigned()
                ->index();
            $table->string("title")->nullable();
            $table->text("body")->nullable();
            $table->string("type", 20)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("contents");
    }
}
