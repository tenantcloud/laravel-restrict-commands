<?php

namespace TenantCloud\RestrictCommands;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class RestrictCommandServiceProvider extends ServiceProvider
{
	public function boot(Dispatcher $events): void
	{
		$this->publishes([
			__DIR__ . '/../config/restricted-commands.php' => config_path('restricted-commands.php'),
		]);

		$events->listen(CommandStarting::class, [StopRestrictedCommandExecution::class, 'handle']);
	}

	public function register(): void
	{
		parent::register();

		$this->mergeConfigFrom(
			__DIR__ . '/../config/restricted-commands.php',
			'restricted-commands'
		);
	}
}
