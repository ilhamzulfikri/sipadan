<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('rupiah', function ($expression) {
            return "<?php echo number_format($expression, 0, ',', '.'); ?>";
        });
    }

    

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
