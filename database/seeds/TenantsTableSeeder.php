<?php

use App\Models\{
    Plan,
    Tenant
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '123121321321',
            'name' => 'NicollasCp',
            'url' => 'nicollascp',
            'email' => 'lyod.hp@gmail.com'
        ]);
    }
}
