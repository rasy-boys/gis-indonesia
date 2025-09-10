<?php

namespace App\Providers;
use App\Models\Berita;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
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
        View::composer('component.footer', function ($view) {
            $recentPosts = Berita::orderBy('created_at', 'desc')->take(3)->get();
            $view->with('recentPosts', $recentPosts);
        });

        Carbon::setLocale('id');
        App::setLocale('id');
    }
}
