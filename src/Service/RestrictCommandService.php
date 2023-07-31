<?php

namespace TenantCloud\RestrictCommands\Service;

use Symfony\Component\Console\Exception\LogicException;

class RestrictCommandService
{
	public function throwIfCommandRestrictedInCurrentEnvironment(string $commandName): void
	{
		if ($this->isCommandRestrictedInCurrentEnvironment($commandName)) {
			throw new LogicException('A command is not allowed in the current environment.');
		}
	}

	private function isCommandRestrictedInCurrentEnvironment(string $commandName): bool
	{
		return app()->environment(config('restricted-commands.environments'))
			&& in_array($commandName, config('restricted-commands.commands'), true);
	}
}
