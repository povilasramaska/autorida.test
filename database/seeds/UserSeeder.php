<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,5) as $x){
            $user = new User;
            $user->name = $faker->firstName;
            $user->surname = $faker->lastName;
            $user->birthday = "1980-05-10";
            $user->email = $faker->email;
            $user->password = \Hash::make('demo');
            $user->phone = $faker->phoneNumber;
            $user->address = $faker->streetAddress;
            $user->city = $faker->city;
            $user->zipcode = $faker->postcode;
            $user->country = $faker->country;
            $user->role = "user";
            $user->save();
        }

        $user = new User;
        $user->name = $faker->firstName;
        $user->surname = $faker->lastName;
        $user->birthday = "1995-01-03";
        $user->email = 'admin@admin.lt';
        $user->password = \Hash::make('admin');
        $user->phone = $faker->phoneNumber;
        $user->address = $faker->streetAddress;
        $user->city = $faker->city;
        $user->zipcode = $faker->postcode;
        $user->country = $faker->country;
        $user->role = "admin";
        $user->save();

        $user = new User;
        $user->name = $faker->firstName;
        $user->surname = $faker->lastName;
        $user->birthday = "1980-05-10";
        $user->email = "simple@simple.lt";
        $user->password = \Hash::make('demo');
        $user->phone = $faker->phoneNumber;
        $user->address = $faker->streetAddress;
        $user->city = $faker->city;
        $user->zipcode = $faker->postcode;
        $user->country = $faker->country;
        $user->role = "user";
        $user->save();


    }
}
