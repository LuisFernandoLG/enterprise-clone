<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('slug')->unique();
            $table->string('url_image');
            $table->unsignedBigInteger('author_id');
            $table->integer('likes')->default(0);
            $table->enum('status', ['published', 'draft', 'deleted'])->default('draft');
            $table->timestamps();
            // row with only 3 possible values: published, draft, deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_posts');
    }
};
