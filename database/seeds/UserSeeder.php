<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 1)->create();
        $token = $users->first()->createToken('react-test');
        echo $token->plainTextToken;
    }
}
