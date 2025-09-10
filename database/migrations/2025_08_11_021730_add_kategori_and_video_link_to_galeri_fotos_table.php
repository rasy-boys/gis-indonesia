<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('galeri_fotos', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->after('id')->constrained('kategori_galeri')->onDelete('set null');
            $table->string('video_link')->nullable()->after('foto');
        });
    }
    
    public function down()
    {
        Schema::table('galeri_fotos', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
            $table->dropColumn('video_link');
        });
    }
    
};
