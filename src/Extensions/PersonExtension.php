<?php

namespace Xefi\Faker\DaDk\Extensions;

use DateTimeImmutable;
use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'da_DK';
    }

    protected $firstNameMale = [
        'Peter', 'Michael', 'Lars', 'Jens', 'Thomas', 'Henrik', 'Søren', 'Christian', 'Martin', 'Jan',
        'Morten', 'Jesper', 'Anders', 'Niels', 'Mads', 'Rasmus', 'Hans', 'Per', 'Jørgen', 'Ole',
        'Mikkel', 'Kasper', 'Frederik', 'Mathias', 'Jonas', 'Emil', 'Magnus', 'Oliver', 'William', 'Noah',
        'Lucas', 'Carl', 'Viktor', 'Malthe', 'Aksel', 'Villads', 'Poul', 'Erik', 'Torben', 'Steen',
    ];

    protected $firstNameFemale = [
        'Anne', 'Kirsten', 'Mette', 'Hanne', 'Anna', 'Helle', 'Susanne', 'Lene', 'Maria', 'Marianne',
        'Lone', 'Camilla', 'Pia', 'Louise', 'Charlotte', 'Bente', 'Tina', 'Inge', 'Karen', 'Gitte',
        'Julie', 'Ida', 'Emma', 'Sofie', 'Freja', 'Clara', 'Alma', 'Ella', 'Laura', 'Signe',
        'Cecilie', 'Mathilde', 'Nanna', 'Karoline', 'Line', 'Birgitte', 'Rikke', 'Malene', 'Astrid', 'Agnes',
    ];

    protected $lastName = [
        'Nielsen', 'Jensen', 'Hansen', 'Pedersen', 'Andersen', 'Christensen', 'Larsen', 'Sørensen', 'Rasmussen', 'Jørgensen',
        'Petersen', 'Madsen', 'Kristensen', 'Olsen', 'Thomsen', 'Christiansen', 'Poulsen', 'Johansen', 'Møller', 'Mortensen',
        'Knudsen', 'Jakobsen', 'Mikkelsen', 'Olesen', 'Frederiksen', 'Laursen', 'Henriksen', 'Lund', 'Schmidt', 'Holm',
        'Eriksen', 'Kristiansen', 'Nissen', 'Clausen', 'Simonsen', 'Svendsen', 'Andreasen', 'Iversen', 'Vestergaard', 'Østergaard',
    ];

    protected $titleMale = ['Hr.', 'Dr.', 'Prof.'];
    protected $titleFemale = ['Fru', 'Frk.', 'Dr.', 'Prof.'];

    /**
     * Get a random CPR number (personnummer) whose last digit is odd for men and even for women.
     *
     * @param ?string $gender
     * @param bool    $formatted
     *
     * @return string
     */
    public function cpr(?string $gender = null, bool $formatted = false): string
    {
        $year = $this->randomizer->getInt(1940, 2023);
        $month = $this->randomizer->getInt(1, 12);
        $daysInMonth = (int) (new DateTimeImmutable(sprintf('%04d-%02d-01', $year, $month)))->format('t');
        $day = $this->randomizer->getInt(1, $daysInMonth);

        $date = sprintf('%02d%02d%02d', $day, $month, $year % 100);
        $centuryDigits = $year >= 2000 ? [4, 5, 6, 7, 8, 9] : [0, 1, 2, 3, 4, 9];
        $weights = [4, 3, 2, 7, 6, 5, 4, 3, 2];

        do {
            $base = sprintf('%s%d%02d', $date, $this->pickArrayRandomElement($centuryDigits), $this->randomizer->getInt(0, 99));

            $sum = 0;
            foreach ($weights as $index => $weight) {
                $sum += $weight * (int) $base[$index];
            }

            $checkDigit = (11 - $sum % 11) % 11;
        } while (
            $checkDigit === 10
            || ($gender === static::GENDER_MALE && $checkDigit % 2 === 0)
            || ($gender === static::GENDER_FEMALE && $checkDigit % 2 === 1)
        );

        $cpr = $base.$checkDigit;

        if ($formatted) {
            return sprintf('%s-%s', substr($cpr, 0, 6), substr($cpr, 6, 4));
        }

        return $cpr;
    }
}
