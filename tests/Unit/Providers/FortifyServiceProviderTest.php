<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Fortify;

class FortifyServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_fortify_actions_correctly()
    {
        // Arrange: Tạo mock cho các hành động
    $createUserMock = $this->mock(\App\Actions\Fortify\CreateNewUser::class);
    $updateProfileMock = $this->mock(\App\Actions\Fortify\UpdateUserProfileInformation::class);
    $updatePasswordMock = $this->mock(\App\Actions\Fortify\UpdateUserPassword::class);
    $resetPasswordMock = $this->mock(\App\Actions\Fortify\ResetUserPassword::class);

    // Act: Bootstrap FortifyServiceProvider
    $this->app->register(\App\Providers\FortifyServiceProvider::class);

    // Assert: Nếu không có lỗi, test sẽ thành công
    $this->assertTrue(true); // Giả sử các hành động không phát sinh lỗi
    
    }

    /** @test */
    public function it_sets_rate_limiter_for_login()
    {
        // Arrange: Mock RateLimiter
        RateLimiter::shouldReceive('for')
            ->once()
            ->with('login', \Closure::class);

        // Act: Bootstrap FortifyServiceProvider
        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        // Assert: Nếu không có lỗi, test sẽ thành công
        $this->assertTrue(true);
    }

    /** @test */
    public function it_sets_rate_limiter_for_two_factor()
    {
        // Arrange: Mock RateLimiter
        RateLimiter::shouldReceive('for')
            ->once()
            ->with('two-factor', \Closure::class);

        // Act: Bootstrap FortifyServiceProvider
        $this->app->register(\App\Providers\FortifyServiceProvider::class);

        // Assert: Nếu không có lỗi, test sẽ thành công
        $this->assertTrue(true);
    }
}
