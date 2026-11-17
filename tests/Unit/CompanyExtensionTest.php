<?php

namespace Xefi\Faker\DaDk\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\DaDk\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testCompanyNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->companyNumber();

            $this->assertMatchesRegularExpression('/^[1-9]\d{7}$/', $result);
            $this->assertTrue($this->isValidCvr($result), "CVR number '{$result}' fails the modulus 11 check.");
        }
    }

    public function testVat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->vat();

            $this->assertMatchesRegularExpression('/^DK[1-9]\d{7}$/', $result);
            $this->assertTrue($this->isValidCvr(substr($result, 2)), "VAT number '{$result}' is not built on a valid CVR number.");
        }
    }

    /**
     * Check a CVR number against the modulus 11 rule.
     *
     * @param string $cvr
     *
     * @return bool
     */
    private function isValidCvr(string $cvr): bool
    {
        $sum = 0;
        foreach ([2, 7, 6, 5, 4, 3, 2, 1] as $index => $weight) {
            $sum += $weight * (int) $cvr[$index];
        }

        return $sum % 11 === 0;
    }
}
