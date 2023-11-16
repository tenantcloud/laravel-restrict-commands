<?php

namespace TenantCloud\RestrictCommands;

use Illuminate\Console\Events\CommandStarting;
use TenantCloud\RestrictCommands\Service\RestrictCommandService;

class StopRestrictedCommandExecution
{
	public function __construct(
		private readonly RestrictCommandService $restrictCommandService,
	) {}

	public function handle(CommandStarting $event): void
	{
		$this->restrictCommandService->throwIfCommandRestrictedInCurrentEnvironment($event->command);
	}
}
