<?php

declare(strict_types=1);

namespace Minspec\FixtureHello;

final class HelloService
{
    public function __construct(private readonly string $greeting)
    {
    }

    public function greeting(): string
    {
        return $this->greeting;
    }
}
