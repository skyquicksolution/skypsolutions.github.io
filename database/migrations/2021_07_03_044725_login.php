<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Login extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('logins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('password');
           //$table->bigInteger('reg_id')->unsigned();
           // $table->foreign('reg_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');

           $table->foreignId('reg_id')
           ->nullable()
           ->constrained('students')
           ->onDelete('cascade')
           ->onUpdate('cascade');
           /*
            Let me explain the changes:

            id() it's the same of bigIncrements('id'). If you want to change the column name from id to cid, for eg., you can use id('cid');
            foreignId('author') it's the same of unsignedBigInteger('author');
            constrained('users') it's the same of references('id')->on('users'), that by default references the id

            Advanced
            By default, constrained() references the id, but you can change this, passing a second param, for eg., constrained('users', 'cid'), in this case, it's the same of references('cid')->on('users').
           */
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logins', function(Blueprint $table) {
            $table->dropForeign(['reg_id']);
            $table->dropColumn('reg_id');
        });
        Schema::dropIfExists('logins');
    }
}
