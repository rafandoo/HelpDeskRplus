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
        Schema::create('teams', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
                //->onUpdate('cascade')
                //->onDelete('cascade');
            $table->foreignId('sector_id')->constrained('sectors');
                //->onUpdate('cascade')
                //->onDelete('cascade');
            $table->boolean('admin')->default(false);
            $table->primary(['user_id', 'sector_id']);
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
        Schema::dropIfExists('teams');
    }
};
