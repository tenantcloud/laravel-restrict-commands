<?php

namespace TenantCloud\RestrictCommands;

use Illuminate\Support\ServiceProvider;

class RestrictCommandServiceProvider extends ServiceProvider
{
	public function boot(): void
	{
		$this->publishes([
			__DIR__ . '/../config/restricted-commands.php' => config_path('restricted-commands.php'),
		]);
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
