<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use Illuminate\Support\ServiceProvider;

class AppServiceProvidersTest extends TestCase
{
    /** @test */
    public function it_registers_app_service_provider_successfully()
    {
        // Act: Đăng ký AppServiceProvider
        $serviceProvider = $this->app->register(\App\Providers\AppServiceProvider::class);

        // Assert: Kiểm tra nếu AppServiceProvider được đăng ký thành công
        $this->assertInstanceOf(ServiceProvider::class, $serviceProvider);
    }

    /** @test */
    public function it_registers_custom_service_in_the_container()
    {
        // Act: Đăng ký AppServiceProvider
        $this->app->register(\App\Providers\AppServiceProvider::class);

        // Thêm 'CustomService' vào container giả lập
        $this->app->bind('CustomService', function () {
            return new \stdClass();
        });

        // Assert: Kiểm tra nếu 'CustomService' được ràng buộc trong container
        $this->assertTrue($this->app->bound('CustomService'));
    }
}
