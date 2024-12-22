<?php

declare(strict_types=1);

namespace App;

use Nette\Bootstrap\Configurator;


class Bootstrap
{
	public static function boot(): Configurator
	{
		$configurator = new Configurator;
		$appDir = dirname(__DIR__);

		if (true) {
			$configurator->setDebugMode(true);
			$configurator->enableTracy($appDir . '/log');
		}

		$configurator->setTempDirectory($appDir . '/temp');
		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addConfig($appDir . '/config/config.neon');

		return $configurator;
	}
}
