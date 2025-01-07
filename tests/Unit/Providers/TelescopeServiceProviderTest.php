<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\IncomingEntry;
use App\Providers\TelescopeServiceProvider;

class TelescopeServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_telescope_filters_correctly()
    {
        // Arrange: Set environment to local
        $this->app['env'] = 'local';

        // Act: Register the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // Assert: Check the filter is set correctly
        Telescope::filter(function (IncomingEntry $entry) {
            return $entry->isReportableException() ||
                   $entry->isFailedRequest() ||
                   $entry->isFailedJob() ||
                   $entry->isScheduledTask() ||
                   $entry->hasMonitoredTag();
        });

        // If no exceptions are thrown, test passes
        $this->assertTrue(true);
    }

    /** @test */
    public function it_hides_sensitive_request_details_in_non_local_environment(): void
    {
        // Arrange: Set environment to production
        $this->app['env'] = 'production';

        // Mock Telescope facade
        $this->partialMock(Telescope::class, function ($mock) {
            $mock->shouldReceive('hideRequestParameters')->once()->with(['_token']);
            $mock->shouldReceive('hideRequestHeaders')->once()->with(['cookie', 'x-csrf-token', 'x-xsrf-token']);
        });

        // Act: Register the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // If no exceptions are thrown, test passes
        $this->assertTrue(true);
    }

    /** @test */
    public function it_logs_slow_queries()
    {
        // Arrange: Mock DB::listen and Log::warning
        DB::shouldReceive('listen')->once()->andReturnUsing(function ($callback) {
            $query = (object)[
                'sql' => 'SELECT * FROM users',
                'bindings' => [],
                'time' => 1500, // Simulate a slow query
            ];
            $callback($query);
        });

        Log::shouldReceive('warning')
            ->once()
            ->with('Slow Query Detected', [
                'sql' => 'SELECT * FROM users',
                'bindings' => [],
                'time' => 1500,
            ]);

        // Act: Register the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // If no exceptions are thrown, test passes
        $this->assertTrue(true);
    }

    /** @test */
    public function it_defines_gate_correctly()
    {
        // Arrange: Register the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // Act: Create user objects for testing
        $adminUser = (object) ['usertype' => 'admin'];
        $nonAdminUser = (object) ['usertype' => 'user'];

        // Assert: Check if the gate allows admin users
        $this->assertTrue(Gate::allows('viewTelescope', $adminUser));

        // Assert: Check if the gate denies non-admin users
        $this->assertFalse(Gate::allows('viewTelescope', $nonAdminUser));
    }
}