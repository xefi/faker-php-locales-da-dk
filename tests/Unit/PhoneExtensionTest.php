<?php

namespace Xefi\Faker\DaDk\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumberReturnsString(): void
    {
        $number = $this->faker->phoneNumber();

        $this->assertIsString($number);
        $this->assertNotEmpty($number);
    }

    public function testPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[2-9]\d{7}$/', $this->faker->phoneNumber());
        }
    }

    public function testCellPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(2\d|3[01]|4[02]|5[0-3]|6[01]|71|81|9[13])\d{6}$/', $this->faker->cellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+45[2-9]\d{7}$/', $this->faker->indicatoredPhoneNumber());
        }
    }

    public function testSpacedPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[2-9]\d \d{2} \d{2} \d{2}$/', $this->faker->spacedPhoneNumber());
        }
    }
}
