<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use  App\Models\Category;
use App\Policies\CategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Category::class=> CategoryPolicy::class,
    ];
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
