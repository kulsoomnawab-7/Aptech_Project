<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basicinfos', function (Blueprint $table) {
            $table->id();
            $table->string("profileimage"); 
            $table->string("country");  
            $table->string("city");  
            $table->string("date_of_birth"); 
            $table->string("address"); 
            $table->string("postal_code"); 
            $table->integer("userid"); 
            $table->foreign("userid")->on("id")->references("users");
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
        Schema::dropIfExists('basicinfos');
    }
}
