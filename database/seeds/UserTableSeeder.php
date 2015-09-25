<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => str_random(10),
            'lastname'  => str_random(10),
            'email'     => 'test_user_'.str_random(10).'@gmail.com',
            'gender'    => 'male',
            'city'      => 'Bangkok',
            'country'   => 'Thailand',
            'birthdate' =>  '1990-01-01',
        ]);

//        factory(App\User::class, 20)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });
    }
}
