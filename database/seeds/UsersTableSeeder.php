<?php

use App\Models\{
    User,
    Tenant
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::first();

        $tenants->users()->create([
            'name' => 'Nícollas Silva',
            'email' => 'lyod.hp@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
