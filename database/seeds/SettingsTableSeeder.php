<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Setting::find('1');
        if (!$user) {
            factory(User::class)->create([
                'email'       => 'tannguyenit95@gmail.com',
                'copyright'   => 'Copyright @ Tannguyen',
                'address'     => 'Da Nang Viet Nam',
                'phone'       => '01263751380',
                'mobile'      => '01263751380',
                'facebook'    => 'facebook.com/tannguyen1995',
                'google'      => null,
                'twitter'     => null,
                'logo'        => null,
                'maintenance' => 0,

            ]);
        }
    }
}
