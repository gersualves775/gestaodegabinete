<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

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
        Schema::defaultStringLength(191);
		
		if(config('app.env') === 'production') { //se o aplicativo tiver em produção
            URL::forceRootUrl(Config::get('app.url')); //Força o caminho definido no arquivo .env campo APP_URL
                                                       //Sem isto este consideraria sempre o caminho local (localhost)
            URL::forceScheme('https');
        }
    }
}
