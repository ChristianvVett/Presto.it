<?php

namespace App\Providers;

use App\Models\Category;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();
        // se il nostro progetto ha una tabella categoris allora noi sfruttiamo la classe views di laravel ma in particolare il suo metodo share per condividere con tutte le viste del nostro progetto una variabile (categories) che conterrà tutte le categorie prese dal DB
        // questo errore previene in caso di mancato funzionamento del db 
        if(Schema::hasTable('categories')){
            View::share('categories', Category::all());
        }
        
    }
}
