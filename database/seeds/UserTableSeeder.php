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
        DB::table('users')->delete();

        DB::table('users')->insert([
                                    [
                                        'id'        => 1,
                                        'firstname' => 'John',
                                        'lastname'  => 'Doe',
                                        'password'  => md5('test'),
                                        'email'     => 'john.doe@moneyburi.com',
                                        'gender'    => 'male',
                                        'city'      => 'Bangkok',
                                        'country'   => 'Thailand',
                                        'currency'  =>  2,
                                        'birthdate' =>  '1990-01-01',
                                    ],
                                    [
                                        'id'        => 2,
                                        'firstname' => 'Mary',
                                        'lastname'  => 'Jane',
                                        'password'  => md5('test'),
                                        'email'     => 'mary.jane@moneyburi.com',
                                        'gender'    => 'female',
                                        'city'      => 'Tokyo',
                                        'country'   => 'Japan',
                                        'currency'  =>  3,
                                        'birthdate' =>  '1990-01-01',
                                    ]
                                    ]
                                    );
    }
}
