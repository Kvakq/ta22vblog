<?php

namespace App\Providers;

use App\Models\Tag;
use App\Policies\TagPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;



class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Tag::class => TagPolicy::class, 
    ];

    public function boot()
    {
        $this->registerPolicies(); 
    }

}