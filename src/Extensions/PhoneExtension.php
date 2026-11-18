<?php

namespace Xefi\Faker\DaDk\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $indicator = '+45';

    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'da_DK';
    }

    protected array $landlineFormats = [
        '3{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '4{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '6{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '7{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '8{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '9{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '2{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '30{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '31{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '40{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '42{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '50{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '51{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '52{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '53{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '60{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '61{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '71{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '81{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '91{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '93{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    /**
     * Generate a phone number, keeping a separator between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
