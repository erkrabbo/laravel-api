<?php

use App\User;
use App\Admin\User_infos;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            User_infos::create([
                'user_id'   => $user->id,
                'address'   => $faker->address(),
                'phone'     => $faker->phoneNumber(),
                'birth'     => $faker->date()
            ]);
        }
    }
}
