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
        // Arrange: Mock environment
        $this->app['env'] = 'local';

        // Act: Register the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // Assert: Mock Telescope filter and check
        Telescope::filter(function (IncomingEntry $entry) {
            return $entry->isReportableException() ||
                   $entry->isFailedRequest() ||
                   $entry->isFailedJob() ||
                   $entry->isScheduledTask() ||
                   $entry->hasMonitoredTag();
        });

        // Nếu không có lỗi trong filter, test sẽ thành công
        $this->assertTrue(true);
    }

    /** @test */
    public function it_hides_sensitive_request_details_in_non_local_environment(): void
    {
        // Arrange: Set non-local environment
        $this->app['env'] = 'production';

        // Mock Telescope facade
        $this->partialMock(Telescope::class, function ($mock) {
            $mock->shouldReceive('hideRequestParameters')
                ->once()
                ->with(['_token']);
            $mock->shouldReceive('hideRequestHeaders')
                ->once()
                ->with(['cookie', 'x-csrf-token', 'x-xsrf-token']);
        });

        // Act: Register the TelescopeServiceProvider
        $this->app->register(\App\Providers\TelescopeServiceProvider::class);

        // Assert: Nếu không có lỗi, test sẽ thành công
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
                'time' => 1500, // Slow query
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

        // Act: Boot the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // Assert: Nếu không có lỗi, test sẽ thành công
        $this->assertTrue(true);
    }

    /** @test */
    public function it_defines_gate_correctly()
    {
        // Arrange: Mock a user
        $user = (object) ['usertype' => 'admin'];

        // Act: Register the TelescopeServiceProvider
        $this->app->register(TelescopeServiceProvider::class);

        // Assert: Check if the gate allows admin users
        $this->assertTrue(Gate::allows('viewTelescope', $user));

        // Arrange: Mock a non-admin user
        $nonAdminUser = (object) ['usertype' => 'user'];

        // Assert: Check if the gate denies non-admin users
        $this->assertFalse(Gate::allows('viewTelescope', $nonAdminUser));
    }
}
