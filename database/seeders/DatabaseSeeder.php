<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
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
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name'=>'John Doe',
            'email'=>'johndoe@gmail.com'
        ]);
        

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Laravel senior dev',
        //     'tags' =>'laravel, javascript',
        //     'company' =>'Acme Int',
        //     'location'=>'Nairobi, Kenya',
        //     'email'=>'email@acme.com',
        //     'website'=>'https://www.acme.com',
        //     'description'=>'Lorem ipsum dolor sit amet consecteur adispisicing elit.'
        // ]);
    }
}
