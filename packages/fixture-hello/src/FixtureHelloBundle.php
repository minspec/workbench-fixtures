<?php

declare(strict_types=1);

namespace Minspec\FixtureHello;

use Minspec\FixtureHello\Command\HelloCommand;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

use function Symfony\Component\DependencyInjection\Loader\Configurator\param;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

/**
 * Fixture apparatus: the smallest bundle that proves the package road.
 *
 * The greeting parameter deliberately has no default here — it exists
 * only when the recipe's copied config file loads, so a missing copy
 * fails the container compile loudly instead of degrading quietly.
 */
final class FixtureHelloBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->services()
            ->set('fixture_hello.service', HelloService::class)
            ->args([param('fixture_hello.greeting')])
            ->public();

        $container->services()
            ->set(HelloCommand::class)
            ->args([service('fixture_hello.service')])
            ->tag('console.command');
    }
}
