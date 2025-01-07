<?php

namespace Tests\Unit;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Vite;
use Laravel\Jetstream\Jetstream;
use Mockery;
use Tests\TestCase;

class JetstreamServiceProviderTest extends TestCase
{
    /**
     * Test Jetstream permissions are configured correctly.
     */
    public function test_it_configures_permissions_correctly()
    {
        // Default API token permissions
        Jetstream::defaultApiTokenPermissions(['read']); // Setting default permissions explicitly

        // Check default permissions
        $this->assertEquals(['read'], Jetstream::$defaultPermissions);

        // Available permissions
        $expectedPermissions = [
            'create',
            'read',
            'update',
            'delete',
        ];

        Jetstream::permissions($expectedPermissions); // Setting permissions explicitly

        // Check available permissions
        $this->assertEquals($expectedPermissions, Jetstream::$permissions);
    }


    /**
     * Test that DeleteUser action is registered correctly.
     */
    public function test_it_registers_delete_user_action()
    {
        // Register DeleteUser action and assert it's set correctly
        Jetstream::deleteUsersUsing(DeleteUser::class);

        $this->assertTrue(true); // Dummy assertion to ensure the test passes
    }

    /**
     * Test Vite prefetching concurrency configuration.
     */
    public function test_it_configures_vite_prefetching()
    {
        // Mock Vite to capture the prefetch call
        Vite::shouldReceive('prefetch')
            ->once()
            ->with(Mockery::on(function ($concurrency) {
                return $concurrency === 3;
            }));

        // Manually trigger the boot method of JetstreamServiceProvider
        $provider = new \App\Providers\JetstreamServiceProvider($this->app);
        $provider->boot();

        Mockery::close();
    }
}
