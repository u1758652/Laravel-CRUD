<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        Schema::create('foods_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("foods_id");
            $table->unsignedBigInteger("tag_id");
            $table->timestamps();

            $table->unique(["foods_id", "tag_id"]);

            $table->foreign("foods_id")->references("id")->on("foods")->onDelete("cascade");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('foods_tag');
    }
}
