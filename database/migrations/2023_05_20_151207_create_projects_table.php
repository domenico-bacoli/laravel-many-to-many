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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

             $table->string('title', 200)->unique();
             $table->string('thumb')->nullable();
             $table->string('link', 30);
             $table->text('description');
             //lo slug è il titolo reso leggibile come url, può essere utilizzato al posto dell'id
             $table->string('slug', 200);

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
        Schema::dropIfExists('projects');
    }
};
