<?php

namespace Xefi\Faker\DaDk\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
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

    protected $regions = [
        'Region Hovedstaden', 'Region Sjælland', 'Region Syddanmark', 'Region Midtjylland', 'Region Nordjylland',
    ];

    protected $cities = [
        'København', 'Aarhus', 'Odense', 'Aalborg', 'Esbjerg', 'Randers', 'Kolding', 'Horsens', 'Vejle', 'Roskilde',
        'Herning', 'Hørsholm', 'Helsingør', 'Silkeborg', 'Næstved', 'Fredericia', 'Viborg', 'Køge', 'Holstebro', 'Taastrup',
        'Slagelse', 'Hillerød', 'Sønderborg', 'Svendborg', 'Hjørring', 'Holbæk', 'Frederikshavn', 'Nørresundby', 'Ringsted', 'Haderslev',
        'Skive', 'Nyborg', 'Ribe', 'Thisted', 'Rønne',
    ];

    protected $streetSuffixes = [
        'gade', 'vej', 'vejen', 'allé', 'stræde', 'vænget', 'parken', 'plads',
    ];

    protected $streetNames = [
        'Nørre', 'Vester', 'Øster', 'Sønder', 'Kirke', 'Skole', 'Strand', 'Mølle', 'Skov', 'Bakke',
        'Lyng', 'Eng', 'Have', 'Rose', 'Bøge', 'Ege', 'Birke', 'Fjord', 'Stations', 'Klokker',
        'Kloster', 'Bred', 'Torve', 'Smede', 'Bager', 'Kongens', 'Dronningens', 'Rådhus', 'Havne', 'Sø',
        'Mark', 'Toft', 'Ager', 'Holme', 'Lunde', 'Ny',
    ];

    /**
     * Get a random region name.
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Get a random city name.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Get a random four digits postcode (postnummer).
     *
     * @return string
     */
    public function postcode(): string
    {
        return (string) $this->randomizer->getInt(1000, 9990);
    }

    /**
     * Get a random house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 250);
    }

    /**
     * Get a random street name.
     *
     * @return string
     */
    public function streetName(): string
    {
        return $this->pickArrayRandomElement($this->streetNames).$this->pickArrayRandomElement($this->streetSuffixes);
    }

    /**
     * Get a random street address.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Get a random full address.
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %s %s', $this->streetAddress(), $this->postcode(), $this->city());
    }
}
