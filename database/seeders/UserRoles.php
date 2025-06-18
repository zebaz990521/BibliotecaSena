<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'worker1']);
        Role::create(['name' => 'worker2']);

        $user = User::find(1);
        $user->assignRole('admin');

       /*  $user2 = User::find(2);
        $user2->assignRole('worker1'); */
    }
}
