<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'username'       => $faker->name,
        'first_name'     => $faker->name,
        'last_name'      => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('123qweasd'),
        'avatar'         => 'default.jpg',
        'birthday'       => date('Y-m-d'),
        'gender'         => $faker->boolean,
        'address'        => $faker->address,
        'phone'          => $faker->phoneNumber,
        'provice_id'     => '',
        'active'         => rand(1, 10),
        'role'           => config('setting.role.member'),
        'bio'            => '01263751380',
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Models\Type::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});
$factory->define(App\Models\Status::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    static $userIds;
    static $typeId;
    static $statusId;
    return [
        'user_id'       => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'title'         => $faker->name,
        'description'   => $faker->text($maxNbChars = 500),
        'type_id'       => $faker->randomElement($typeId ?: $typeId = App\Models\Type::pluck('id')->toArray()),
        'status_id'     => $faker->randomElement($statusId ?: $statusId = App\Models\Status::pluck('id')->toArray()),
        'price'         => rand(500000, 2000000),
        'area'          => rand(10, 20),
        'bedrooms'      => rand(1, 10),
        'bathrooms'     => rand(1, 10),
        'phone_boss'    => $faker->phoneNumber,
        'name_boss'     => $faker->name,
        'address'       => $faker->address,
        'township'      => $faker->state,
        'township_slug' => str_slug($faker->state),
        'country'       => $faker->country,
        'active'        => 1,
        'lat'           => $faker->latitude($min = 16.018110864140947, $max = 16.09465455449266),
        'lng'           => $faker->longitude($min = 108.18053736650393, $max = 108.24714198076174),
        'total_view'    => rand(50, 500),
        'total_like'    => rand(80, 500),
        'total_comment' => rand(80, 500),
    ];
});
$factory->define(App\Models\Like::class, function (Faker\Generator $faker) {
    static $userIds;
    static $postId;
    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'post_id' => $faker->randomElement($postId ?: $postId = App\Models\Post::pluck('id')->toArray()),
        'status'  => $faker->boolean,
    ];
});
$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    static $userIds;
    static $postId;
    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'post_id' => $faker->randomElement($postId ?: $postId = App\Models\Post::pluck('id')->toArray()),
        'content' => $faker->text,
    ];
});
