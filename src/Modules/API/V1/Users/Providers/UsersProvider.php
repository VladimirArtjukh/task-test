<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2024 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Providers;

use Modules\API\V1\Users\Repositories\UserRepository;
use Modules\API\V1\Users\Repositories\Interfaces\UserRepositoryInterface;
use Modules\API\V1\Users\Services\UserService;
use Modules\API\V1\Users\Services\Interfaces\UserServiceInterface;

use Illuminate\Support\ServiceProvider;

class UsersProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
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
