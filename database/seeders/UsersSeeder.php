<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }


    public function run(): void
    {
        $users = [
            [
                'name' => 'Hana Seales',
                'email' => 'hana@gmail.com',
                'password' =>  Hash::make('1234'),
                'role_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'John Hunter',
                'email' => 'john@gmail.com',
                'password' =>  Hash::make('5678'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Erin Chester',
                'email' => 'erin@gmail.com',
                'password' =>  Hash::make('91011'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            ];
            $this->user->insert($users);
    }
}
