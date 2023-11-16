<?php

namespace Tests;

use Illuminate\Console\Events\CommandStarting;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TenantCloud\RestrictCommands\Service\RestrictCommandService;
use TenantCloud\RestrictCommands\StopRestrictedCommandExecution;

#[CoversClass(StopRestrictedCommandExecution::class)]
class StopRestrictedCommandExecutionTest extends TestCase
{
	public function testCallThrowOnRestricted(): void
	{
		$restrictCommandService = mock(RestrictCommandService::class);
		$restrictCommandService->expects()->throwIfCommandRestrictedInCurrentEnvironment('test');

		(new StopRestrictedCommandExecution(
			$restrictCommandService
		))->handle(
			new CommandStarting('test', mock(InputInterface::class), mock(OutputInterface::class))
		);
	}
}
