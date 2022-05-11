<?php

declare(strict_types=1);

namespace AliceDataFixtures;

class ConfigProvider
{
    public function __invoke(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
