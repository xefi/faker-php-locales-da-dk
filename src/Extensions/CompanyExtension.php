<?php

namespace Xefi\Faker\DaDk\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
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

    private array $companies = [
        'Nielsen & Søn ApS', 'Jysk Byggeselskab A/S', 'Hansen Maskinfabrik A/S',
        'Københavns Rådgivning ApS', 'Fynske Mejerier A.m.b.a.', 'Vestkystens Fiskeri ApS',
        'Nordjysk Transport A/S', 'Pedersen VVS ApS', 'Østjysk Energi A/S',
        'Sjællands Tømrerfirma ApS', 'Aarhus Software IvS', 'Limfjordens Rederi A/S',
        'Bornholms Keramik ApS', 'Møller & Madsen Advokater P/S', 'Skagen Turisme ApS',
        'Odense Elektro A/S', 'Dansk Møbelsnedkeri ApS', 'Kronborg Revision P/S',
        'Himmerlands Landbrug I/S', 'Svendborg Værft A/S', 'Vejle Logistik ApS',
        'Grønt Fællesskab A.m.b.a.', 'Larsen Arkitekter ApS', 'Ribe Bryghus ApS',
        'Thy Vindkraft A/S', 'Christensen Murerfirma ApS', 'Aalborg Medicoteknik A/S',
        'Roskilde Bageri ApS', 'Silkeborg Papir A/S', 'Sønderjysk Handelshus A/S',
    ];

    /**
     * Get a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Get a random CVR number passing the modulus 11 check.
     *
     * @return string
     */
    public function companyNumber(): string
    {
        $weights = [2, 7, 6, 5, 4, 3, 2];

        do {
            $digits = (string) $this->randomizer->getInt(1000000, 9999999);

            $sum = 0;
            foreach ($weights as $index => $weight) {
                $sum += $weight * (int) $digits[$index];
            }

            $checkDigit = (11 - $sum % 11) % 11;
        } while ($checkDigit === 10);

        return $digits.$checkDigit;
    }

    /**
     * Get a random VAT number (momsnummer), built on a CVR number.
     *
     * @return string
     */
    public function vat(): string
    {
        return 'DK'.$this->companyNumber();
    }
}
