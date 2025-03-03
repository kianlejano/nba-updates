<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('toPhTime', function ($datetime) {
            return "<?php echo \Carbon\Carbon::parse($datetime)->setTimezone('Asia/Manila')->format('h:i A'); ?>";
        });
    }
}
