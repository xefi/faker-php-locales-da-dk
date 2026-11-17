<?php

namespace Xefi\Faker\DaDk\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
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

    protected array $safeColorNames = [
        'Sort', 'Rødbrun', 'Grøn', 'Marineblå', 'Olivengrøn',
        'Lilla', 'Blågrøn', 'Limegrøn', 'Blå', 'Sølv',
        'Grå', 'Gul', 'Fuchsia', 'Akva', 'Hvid',
    ];

    protected array $colorNames = [
        'Sort', 'Rødbrun', 'Grøn', 'Marineblå', 'Olivengrøn',
        'Lilla', 'Blågrøn', 'Limegrøn', 'Blå', 'Sølv',
        'Grå', 'Gul', 'Fuchsia', 'Akva', 'Hvid',
        'Beige', 'Chokolade', 'Koral', 'Cyan', 'Karmoisin',
        'Mørkeblå', 'Mørkeorange', 'Murstensrød', 'Havgrøn', 'Blomsterhvid',
        'Skovgrøn', 'Guld', 'Lyserød', 'Indigo', 'Kaki',
        'Lavendel', 'Lyseblå', 'Lysekoral', 'Lysegrøn', 'Lyselaks',
        'Linned', 'Magenta', 'Mellemblå', 'Mellemorkidé', 'Mokkasin',
        'Orange', 'Rød', 'Blomme', 'Peru', 'Kongeblå',
        'Laks', 'Sandbrun', 'Himmelblå', 'Snehvid', 'Turkis',
        'Violet', 'Røghvid',
    ];
}
