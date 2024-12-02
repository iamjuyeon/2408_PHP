<?php

namespace App\Providers;

use App\Exceptions\MyAuthException;
use Illuminate\Support\ServiceProvider;
use App\Utils\MyEncrypt;
use App\Utils\MyToken;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //서비스 클래스 넣기
        $this->app->bind('MyEncrypt', function() {
            return new MyEncrypt();
        });
        
        $this->app->bind('MyToken', function() {
            return new MyToken();
        });

        $this->app->bind('MyAuthException', function() {
            return new MyAuthException();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
