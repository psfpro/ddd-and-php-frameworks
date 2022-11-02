<?php

namespace App\Common\Infrastructure\Providers;

use App\Common\Application\Command\CommandBus;
use App\Common\Application\Query\QueryBus;
use App\Common\Domain\EventBus;
use App\Common\Infrastructure\Bus\Messenger\MessengerCommandBus;
use App\Common\Infrastructure\Bus\Messenger\MessengerEventBus;
use App\Common\Infrastructure\Bus\Messenger\MessengerQueryBus;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CommandBus::class,
            function ($app) {
                $handlers = [];
                $bus = new MessageBus([
                    new HandleMessageMiddleware(
                        new HandlersLocator($handlers)
                    ),
                ]);
                return new MessengerCommandBus($bus);
            }
        );

        $this->app->bind(
            EventBus::class,
            function ($app) {
                $handlers = [];
                $bus = new MessageBus([
                    new HandleMessageMiddleware(
                        new HandlersLocator($handlers)
                    ),
                ]);
                return new MessengerEventBus($bus);
            }
        );

        $this->app->bind(
            QueryBus::class,
            function ($app) {
                $handlers = [];
                $bus = new MessageBus([
                    new HandleMessageMiddleware(
                        new HandlersLocator($handlers)
                    ),
                ]);
                return new MessengerQueryBus($bus);
            }
        );

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
