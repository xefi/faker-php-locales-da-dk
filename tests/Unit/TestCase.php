<?php

namespace Xefi\Faker\DaDk\Tests\Unit;

use Xefi\Faker\Container\Container;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        $this->faker = (new Container(false))->locale('da_DK');
    }
}
