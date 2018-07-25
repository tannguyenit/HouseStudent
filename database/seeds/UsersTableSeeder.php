<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();
        $user = User::where('email', 'tannguyenit95@gmail.com')->first();
        if (!$user) {
            factory(User::class)->create([
                'username'       => 'tannguyenit',
                'first_name'     => 'Nguyen',
                'last_name'      => 'Tan',
                'email'          => 'tannguyenit95@gmail.com',
                'password'       => Hash::make('123qweasd'),
                'avatar'         => 'default.jpg',
                'birthday'       => '1995-08-06',
                'gender'         => null,
                'address'        => null,
                'phone'          => null,
                'provice_id'     => null,
                'active'         => '1',
                'role'           => config('setting.role.admin'),
                'bio'            => '01263751380',
                'remember_token' => str_random(10),
            ]);
        }
    }
}
