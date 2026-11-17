<?php

namespace Xefi\Faker\DaDk\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\DaDk\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected AddressExtension $extension;
    protected array $regions = [];
    protected array $cities = [];
    protected array $streetSuffixes = [];
    protected array $streetNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->extension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($this->extension);

        $this->regions = $reflection->getProperty('regions')->getValue($this->extension);
        $this->cities = $reflection->getProperty('cities')->getValue($this->extension);
        $this->streetSuffixes = $reflection->getProperty('streetSuffixes')->getValue($this->extension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($this->extension);
    }

    public function testRegion(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->regions); $i++) {
            $results[] = $this->faker->unique()->region();
        }

        $this->assertEqualsCanonicalizing(
            $this->regions,
            $results
        );
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing(
            $this->cities,
            $results
        );
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->postcode();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^[1-9]\d{3}$/', $result);
            $this->assertLessThanOrEqual(9990, (int) $result);
        }
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->houseNumber();

            $this->assertIsInt($result);
            $this->assertLessThanOrEqual(250, $result);
            $this->assertGreaterThanOrEqual(1, $result);
        }
    }

    public function testStreetName(): void
    {
        $streets = [];
        foreach ($this->streetNames as $name) {
            foreach ($this->streetSuffixes as $suffix) {
                $streets[] = $name.$suffix;
            }
        }

        for ($i = 0; $i < 100; $i++) {
            $this->assertContains($this->faker->streetName(), $streets);
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\p{L}+ \d{1,3}$/u', $this->faker->streetAddress());
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\p{L}+ \d{1,3}, [1-9]\d{3} [\p{L} ]+$/u', $this->faker->fullAddress());
        }
    }
}
