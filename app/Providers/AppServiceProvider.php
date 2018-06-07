<?php

namespace App\Providers;

use App;
use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\ContactRepository\ContactRepository;
use App\Repositories\ContactRepository\ContactRepositoryInterface;
use App\Repositories\FeaturesRepository\FeaturesRepository;
use App\Repositories\FeaturesRepository\FeaturesRepositoryInterface;
use App\Repositories\ImageRepository\ImageRepository;
use App\Repositories\ImageRepository\ImageRepositoryInterface;
use App\Repositories\LikeRepository\LikeRepository;
use App\Repositories\LikeRepository\LikeRepositoryInterface;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\PostRepository\PostRepositoryInterface;
use App\Repositories\SettingRepository\SettingRepository;
use App\Repositories\SettingRepository\SettingRepositoryInterface;
use App\Repositories\StatusRepository\StatusRepository;
use App\Repositories\StatusRepository\StatusRepositoryInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Session::put('locale', 'en');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(FeaturesRepositoryInterface::class, FeaturesRepository::class);
        App::bind(ImageRepositoryInterface::class, ImageRepository::class);
        App::bind(PostRepositoryInterface::class, PostRepository::class);
        App::bind(SettingRepositoryInterface::class, SettingRepository::class);
        App::bind(StatusRepositoryInterface::class, StatusRepository::class);
        App::bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        App::bind(ContactRepositoryInterface::class, ContactRepository::class);
        App::bind(LikeRepositoryInterface::class, LikeRepository::class);
    }
}
