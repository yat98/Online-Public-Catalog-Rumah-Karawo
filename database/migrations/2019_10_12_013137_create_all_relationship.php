<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->foreign('id_jenis_kain')
                  ->references('id')
                  ->on('jenis_kain')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->foreign('id_kategori')
                  ->references('id')
                  ->on('kategori')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign('produk_id_jenis_kain_foreign');
        });
        
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign('produk_id_kategori_foreign');
        });
    }
}
