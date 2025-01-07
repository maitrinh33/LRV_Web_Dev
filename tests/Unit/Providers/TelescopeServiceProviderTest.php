<?php

namespace Tests\Unit\Providers;

use App\Providers\TelescopeServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\IncomingEntry;
use Mockery;
use Tests\TestCase;

class TelescopeServiceProviderTest extends TestCase
{
    public function testRegistersTelescopeFiltersCorrectly()
    {
        // Mock Telescope facade
        $mockTelescope = Mockery::mock('alias:Laravel\Telescope\Telescope');
        
        $mockTelescope->shouldReceive('filter')
            ->once()
            ->with(Mockery::on(function ($callback) {
                $entry = Mockery::mock(IncomingEntry::class);
                $entry->shouldReceive('isReportableException')->andReturn(false);
                $entry->shouldReceive('isFailedRequest')->andReturn(false);
                $entry->shouldReceive('isFailedJob')->andReturn(false);
                $entry->shouldReceive('isScheduledTask')->andReturn(false);
                $entry->shouldReceive('hasMonitoredTag')->andReturn(false);

                return $callback($entry) === false;
            }));

        $provider = new TelescopeServiceProvider($this->app);
        $provider->register();
    }

    public function testHidesSensitiveRequestDetailsInNonLocalEnvironment()
    {
        // Mock Telescope facade
        $mockTelescope = Mockery::mock('alias:Laravel\Telescope\Telescope');

        $mockTelescope->shouldReceive('hideRequestParameters')
            ->once()
            ->with(['_token']);

        $mockTelescope->shouldReceive('hideRequestHeaders')
            ->once()
            ->with(['cookie', 'x-csrf-token', 'x-xsrf-token']);

        $provider = new TelescopeServiceProvider($this->app);
        $provider->register();
    }

    public function testLogsSlowQueries()
    {
        Log::shouldReceive('warning')
            ->once()
            ->with('Slow Query Detected', Mockery::on(function ($data) {
                return $data['sql'] === 'SELECT * FROM users' &&
                    $data['bindings'] === [] &&
                    $data['time'] === 1500;
            }));

        DB::shouldReceive('listen')
            ->once()
            ->andReturnUsing(function ($callback) {
                $callback((object)[
                    'sql' => 'SELECT * FROM users',
                    'bindings' => [],
                    'time' => 1500,
                ]);
            });

        $provider = new TelescopeServiceProvider($this->app);
        $provider->boot();
    }

    public function testDefinesGateCorrectly()
    {
        Gate::shouldReceive('define')
            ->once()
            ->with('viewTelescope', Mockery::on(function ($callback) {
                $user = (object)['usertype' => 'admin'];
                return $callback($user) === true;
            }));

        $provider = new TelescopeServiceProvider($this->app);
        $provider->register();
    }
}
