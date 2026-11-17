<?php

namespace Xefi\Faker\DaDk\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): string|null
    {
        return 'da_DK';
    }

    /**
     * Get a random IBAN, a Danish one (four digits registration number and ten digits account number) by default.
     *
     * @param ?string $countryCode
     * @param ?string $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'DK';
        }

        if ($format === null) {
            $format = str_repeat('{d}', 4).str_repeat('{d}', 10);
        }

        return parent::iban($countryCode, $format);
    }
}
