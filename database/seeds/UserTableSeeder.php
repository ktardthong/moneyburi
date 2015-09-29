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
                                        'status'    => 0,
                                        'init_setup'=> 0,
                                        'job'       => 1,
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
                                        'status'    => 1,
                                        'init_setup'=> 1,
                                        'job'       => 2,
                                        'city'      => 'Tokyo',
                                        'country'   => 'Japan',
                                        'currency'  =>  3,
                                        'birthdate' =>  '1990-01-01',
                                    ],
                                    [
                                        'id'        => 3,
                                        'firstname' => 'test',
                                        'lastname'  => 'test',
                                        'password'  => md5('test'),
                                        'email'     => 'test.test@gmail.com',
                                        'gender'    => 'male',
                                        'status'    => 1,
                                        'init_setup'=> 1,
                                        'job'       => 2,
                                        'city'      => 'Tokyo',
                                        'country'   => 'Japan',
                                        'currency'  =>  3,
                                        'birthdate' =>  '1984-01-23',
                                    ]
                                    ]
                                    );
    }
}
