<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Str;

class TenantService
{
    private $plan, $data;

    public function make(Plan $plan, Array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();

        return $this->storeUser($tenant);
    }

    public function storeTenant()
    {
        $data = $this->data;
        
        return $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],
            'url' => Str::kebab($data['empresa']),
            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7)
        ]);
    }

    public function storeUser($tenant)
    {
        $data = $this->data;

        $user = $tenant->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $user;
    }
}