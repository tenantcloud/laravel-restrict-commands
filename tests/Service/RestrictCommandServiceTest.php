<?php

namespace Tests\Service;

use Illuminate\Support\Arr;
use LogicException;
use TenantCloud\RestrictCommands\Service\RestrictCommandService;
use Tests\TestCase;

class RestrictCommandServiceTest extends TestCase
{
	public function testThrowExceptionRestrictedCommandAndEnvironment(): void
	{
		app()->detectEnvironment(fn () => Arr::random(config('restricted-commands.environments')));

		$this->expectException(LogicException::class);
		$this->expectExceptionMessage('A command is not allowed in the current environment.');

		$restrictedCommand = Arr::random(config('restricted-commands.commands'));

		resolve(RestrictCommandService::class)->throwIfCommandRestrictedInCurrentEnvironment($restrictedCommand);
	}

	public function testNotThrowExceptionEnvironmentIsAllowed(): void
	{
		// mark that there are no assertions in this test, we do not expect Exception in this test
		$this->expectNotToPerformAssertions();

		app()->detectEnvironment(fn () => Arr::random(['test', 'local']));

		$restrictedCommand = Arr::random(config('restricted-commands.commands'));

		resolve(RestrictCommandService::class)->throwIfCommandRestrictedInCurrentEnvironment($restrictedCommand);
	}

	public function testNotThrowExceptionCommandIsAllowed(): void
	{
		// mark that there are no assertions in this test, we do not expect Exception in this test
		$this->expectNotToPerformAssertions();

		app()->detectEnvironment(fn () => Arr::random(config('restricted-commands.environments')));

		resolve(RestrictCommandService::class)->throwIfCommandRestrictedInCurrentEnvironment('some:command');
	}
}
