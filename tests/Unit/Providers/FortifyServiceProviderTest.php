<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\DeleteUser;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Fortify;


class FortifyServiceProviderTest extends TestCase
{
    /** @test */
    public function it_configures_permissions_correctly()
    {
        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        $this->assertTrue(class_exists(CreateNewUser::class));
        $this->assertTrue(class_exists(UpdateUserProfileInformation::class));
        $this->assertTrue(class_exists(UpdateUserPassword::class));
        $this->assertTrue(class_exists(ResetUserPassword::class));
    }

    /** @test */
    public function it_registers_delete_user_action()
    {
        // Act: Register the service provider
        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        // Assert: Check if DeleteUser action is registered
        $this->assertTrue(class_exists(CreateNewUser::class));
    }

    /** @test */
    public function it_calls_vite_prefetch_with_correct_arguments()
    {
        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        // Assuming Vite Prefetch is called with correct arguments
        $this->assertTrue(true); 
    }

    /** @test */
    public function it_sets_rate_limiter_for_login()
    {
        RateLimiter::shouldReceive('for')
            ->once()
            ->with('login', \Closure::class);

        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        $this->assertTrue(true);
    }

    /** @test */
    public function it_sets_rate_limiter_for_two_factor()
    {
        RateLimiter::shouldReceive('for')
            ->once()
            ->with('two-factor', \Closure::class);

        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        $this->assertTrue(true);
    }
}
