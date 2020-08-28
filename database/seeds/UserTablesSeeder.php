<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            
            'name'=>'Dasun',
            'nic'=>'943153663v',
            'email'=>'dasunmuthuruwan9@gmail.com',
            'password'   =>  Hash::make('slugpwd'),
            'remember_token' =>  str_random(10),
        ]);

    }
}
