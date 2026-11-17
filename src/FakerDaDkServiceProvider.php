<?php

namespace Xefi\Faker\DaDk;

use Xefi\Faker\DaDk\Extensions\AddressExtension;
use Xefi\Faker\DaDk\Extensions\ColorsExtension;
use Xefi\Faker\DaDk\Extensions\CompanyExtension;
use Xefi\Faker\DaDk\Extensions\FinancialExtension;
use Xefi\Faker\DaDk\Extensions\PersonExtension;
use Xefi\Faker\DaDk\Extensions\PhoneExtension;
use Xefi\Faker\DaDk\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerDaDkServiceProvider extends Provider
{
    /**
     * Register the da_DK extensions.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            TextExtension::class,
            PhoneExtension::class,
        ]);
    }
}
