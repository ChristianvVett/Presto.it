<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //creazione di un array con le categorie da inserire 
        $categories = ['Alimentari e cura della casa','App e Giochi', 'Audiolibri', 'Auto e Moto', 'Bellezza', 'Buoni Regalo', 'Cancelleria', 'Casa e Cucina', 'CD e Vinili', 'Elettronica', 'Fai da te', 'Film e TV', 'Giardino e Giardinaggio', 'Giochi e Giocattoli', 'Grandi elettrodomestici', 'Illuminazione', 'industria', 'Informatica', 'Libri', 'Moda', 'Salute e cura della persona', 'Software', 'Sport e tempo libero', 'Strumenti musicali e DJ', 'Valigie e accessori viaggio','Videogiochi'];

        //foreach per l'inserimento di un nuovo record per ogni elemento delle nostre categorie nella tabella
        foreach ($categories as $category){
            Category::create(['name'=>$category]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
