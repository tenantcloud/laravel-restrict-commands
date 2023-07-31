<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use TenantCloud\RestrictCommands\RestrictCommandServiceProvider;

class TestCase extends BaseTestCase
{
	protected function getPackageProviders($app): array
	{
		return [
			RestrictCommandServiceProvider::class,
		];
	}
}
