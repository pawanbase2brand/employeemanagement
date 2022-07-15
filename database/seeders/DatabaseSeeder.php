<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user=User::factory()->create([
            'name' => 'Pawan Singh',
            'email' => 'pawan.rightway@gmail.com',
            'password' => bcrypt('11111111')
        ]);
        $role = Role::create(['name' => 'Super Admin']);
        $user->assignRole([$role->id]);
        \App\Models\User::factory(10)->create();

    }
}
