<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration{
   
    public function up(){

        Schema::create('post_tag', function (Blueprint $table){

            $table->integer('post_id');
            $table->integer('tag_id');


        });
    }

  
    public function down(){

        Schema::dropIfExists('post_tag');
    }
}
