<?php

namespace App\Providers;

use App\Modules\Order\OrderStorage;
use App\Orm\ShardingStrategy;
use App\Services\OrderStorageInterface;
use App\Services\QuickSort;
use App\Services\QuickSortInterface;
use App\Services\ShardingStragegyInterace;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoggerInterface::class, function ($app) {
            return new Logger('highload_logger');
        });
        $this->app->bind(QuickSortInterface::class, QuickSort::class);
        $this->app->bind(ShardingStragegyInterace::class, ShardingStrategy::class);
        $this->app->bind(OrderStorageInterface::class, OrderStorage::class);
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
