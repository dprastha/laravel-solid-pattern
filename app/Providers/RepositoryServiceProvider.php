<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\UserInterface\UserInterface',
            'App\Repositories\UserRepository\UserRepository',
        );

        $this->app->bind(
            'App\Interfaces\PostInterface\PostInterface',
            'App\Repositories\PostRepository\PostRepository',
        );

        $this->app->bind(
            'App\Interfaces\CommentInterface\CommentInterface',
            'App\Repositories\CommentRepository\CommentRepository',
        );
    }
}
