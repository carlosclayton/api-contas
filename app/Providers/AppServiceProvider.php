<?php

namespace ApiContas\Providers;

use Dingo\Api\Exception\Handler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment() !== 'production'){
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $handler = app(Handler::class);
        $handler->register(function(AuthenticationException $exception){
            return response()->json(['error' => 'Unauthenticated'], 401);
        });

        $handler->register(function(JWTException $exception){
            return response()->json(['error' => $exception->getMessage()], 401);
        });

        $handler->register(function(ValidationException $exception){
            return response()->json([
                'error' => $exception->getMessage(),
                'validation_errors' => $exception->validator->getMessageBag()->toArray()
            ], 401);
        });

    }
}
