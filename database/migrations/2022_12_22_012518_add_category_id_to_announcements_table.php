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
        Schema::table('announcements', function (Blueprint $table) {
             // inserimento delle chiave foreign key

            //creazione di un campo con un numero sempre positivo di grandi dimensioni che può essere un nullable per poter gestire tutti i campi creati in precedenza
            $table->unsignedBigInteger('category_id')->nullable();

            //il campo appena creato è una foreign key che fa riferimento ai campi id sulla tabella categories e che all'eliminazione questo campo sulla tabella annunci deve diventare null
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            //fare l'opposto della function up
            // eliminiamo prima la foreign key e poi la colonna 
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id']); 
        });
    }
};
