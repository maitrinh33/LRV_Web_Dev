<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Vite;

class JetstreamServiceProviderTest extends TestCase
{
    /** @test */
    /** @test */
public function it_configures_permissions_correctly()
{
    // Arrange: Mock Jetstream facade
    $mockJetstream = $this->partialMock(Jetstream::class, function ($mock) {
        $mock->shouldReceive('defaultApiTokenPermissions')
            ->once()
            ->with(['read']);

        $mock->shouldReceive('permissions')
            ->once()
            ->with(['create', 'read', 'update', 'delete']);
    });

    // Act: Bootstrap JetstreamServiceProvider
    $this->app->register(\App\Providers\JetstreamServiceProvider::class);

    // Assert: Nếu không có lỗi, test sẽ thành công
    $this->assertTrue(true);
}

/** @test */
public function it_registers_delete_user_action()
{
    // Arrange: Mock Jetstream facade
    $mockJetstream = $this->partialMock(Jetstream::class, function ($mock) {
        $mock->shouldReceive('deleteUsersUsing')
            ->once()
            ->with(\App\Actions\Jetstream\DeleteUser::class);
    });

    // Act: Bootstrap JetstreamServiceProvider
    $this->app->register(\App\Providers\JetstreamServiceProvider::class);

    // Assert: Nếu không có lỗi, test sẽ thành công
    $this->assertTrue(true);
}


    /** @test */
    public function it_calls_vite_prefetch_with_correct_arguments()
    {
        // Arrange: Mock Vite facade
        Vite::shouldReceive('prefetch')
            ->once()
            ->with(['concurrency' => 3]);

        // Act: Bootstrap JetstreamServiceProvider
        $this->app->register(\App\Providers\JetstreamServiceProvider::class);

        // Assert: Nếu không có lỗi, test sẽ thành công
        $this->assertTrue(true);
    }
}
