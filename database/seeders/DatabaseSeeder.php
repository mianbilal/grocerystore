<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

     $user = \App\Models\User::factory()->create([
          'name' => 'Mian Bilal',
          'email' => 'bilal@example.com',
          'password'=>bcrypt('password'),
          'admin'=>1 
         ]);

         \App\Models\Profile::create([
            'user_id' => $user->id,
            'avatar'=>'uploads/avatars/1.jpg',
            'about' => 'He is an Administrator',
            'facebook'=>'facebook.com',
            'twitter'=>'twitter.com',
           ]);

           
         \App\Models\Setting::create([
            'name' => 'Grocery Store',
            'number'=>'090078601',
            'about' => 'This store is for the purchase of daily used items.',
            'email'=>'grocery@gmail.com',
            'address'=>'ShahKot Faisalabad.',
            'message'=>'Buy Your Groceries and Enjoy the Day.',
           ]);
    }
}
