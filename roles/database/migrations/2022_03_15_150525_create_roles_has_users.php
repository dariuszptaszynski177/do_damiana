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
        Schema::create('roles_has_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->integer('users_id')->unsigned;
            //$table->integer('roles_id')->unsigned;
            $table->timestamps();
        });
        /* nie działa - kod z odcinka
        Schema::table('roles_has_users', function (Blueprint $table)
        {
            $table->foreign('users_id')
                ->references('id')
                ->on('users');
        });
        
        Schema::table('roles_has_users', function (Blueprint $table)
        {
            $table->foreign('roles_id')
                ->references('id')
                ->on('roles');
        });
        */
        
        //działa
        Schema::table('roles_has_users', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');

            $table->foreign('users_id')
            ->references('id')
            ->on('users');
        });
        
        Schema::table('roles_has_users', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id');

            $table->foreign('roles_id')
            ->references('id')
            ->on('roles');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_has_users');
    }
};
