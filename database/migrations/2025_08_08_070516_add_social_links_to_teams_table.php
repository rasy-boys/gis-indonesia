<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['instagram', 'facebook', 'linkedin', 'twitter', 'youtube']);
        });
    }
    
};
