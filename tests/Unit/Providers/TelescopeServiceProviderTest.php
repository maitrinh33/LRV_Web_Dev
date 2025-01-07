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
