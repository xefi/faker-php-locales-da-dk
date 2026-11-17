<?php

namespace Xefi\Faker\DaDk\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
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
     * Text in format => Paragraphs => Sentences => Words.
     *
     * @var array|array[]
     */
    protected array $paragraphs = [
        [
            ['Kvaliteten', 'af', 'ydelserne', 'er', 'fortsat', 'et', 'centralt', 'mål', 'i', 'erhvervslivet.'],
            ['Hvert', 'projekt', 'kræver', 'særlig', 'opmærksomhed', 'for', 'at', 'sikre', 'et', 'godt', 'resultat.'],
            ['Holdene', 'arbejder', 'tæt', 'sammen', 'for', 'at', 'nå', 'de', 'fælles', 'mål.'],
            ['God', 'kommunikation', 'mellem', 'kollegerne', 'giver', 'en', 'højere', 'produktivitet.'],
        ],
        [
            ['Styringen', 'af', 'ressourcerne', 'er', 'afgørende', 'for', 'den', 'samlede', 'præstation.'],
            ['Arbejdsmetoderne', 'udvikler', 'sig', 'i', 'takt', 'med', 'behovene', 'og', 'teknologien.'],
            ['Tilpasningsevne', 'gør', 'det', 'muligt', 'for', 'virksomheder', 'at', 'forblive', 'konkurrencedygtige', 'og', 'innovative.'],
            ['Processerne', 'bliver', 'gennemgået', 'for', 'at', 'forbedre', 'resultaterne', 'og', 'imødekomme', 'markedets', 'krav.'],
        ],
        [
            ['Kundernes', 'tilfredshed', 'afhænger', 'af', 'kvaliteten', 'af', 'ydelsen', 'og', 'af', 'reaktionstiden.'],
            ['Nøgletal', 'bruges', 'til', 'at', 'måle', 'resultaterne', 'og', 'til', 'at', 'styre', 'de', 'strategiske', 'beslutninger.'],
            ['De', 'daglige', 'udfordringer', 'løses', 'takket', 'være', 'god', 'ledelse', 'og', 'de', 'rette', 'kompetencer.'],
            ['En', 'løbende', 'evaluering', 'af', 'arbejdsgangene', 'viser', 'mulige', 'forbedringer.'],
        ],
        [
            ['Uddannelse', 'og', 'kompetenceudvikling', 'har', 'høj', 'prioritet', 'i', 'virksomhederne.'],
            ['Medarbejderne', 'opfordres', 'til', 'at', 'tilegne', 'sig', 'nye', 'færdigheder', 'og', 'til', 'at', 'tænke', 'nyt.'],
            ['Strategier', 'for', 'løbende', 'forbedring', 'hjælper', 'med', 'at', 'øge', 'ydeevnen', 'og', 'mindske', 'risikoen.'],
            ['Tilpassede', 'uddannelsesforløb', 'støtter', 'både', 'den', 'enkeltes', 'og', 'fællesskabets', 'udvikling.'],
        ],
        [
            ['Dataanalyse', 'hjælper', 'med', 'at', 'finde', 'områder', 'med', 'potentiale', 'for', 'vækst', 'og', 'forbedring.'],
            ['Målene', 'justeres', 'efter', 'markedets', 'udvikling', 'og', 'kundernes', 'forventninger.'],
            ['Når', 'fremskridtene', 'følges', 'tæt,', 'kan', 'man', 'hurtigt', 'tilpasse', 'sig', 'forandringer.'],
            ['Beslutningerne', 'træffes', 'på', 'grundlag', 'af', 'pålidelige', 'data', 'og', 'præcise', 'analyser.'],
            ['Jævnlige', 'gennemgange', 'gør', 'det', 'muligt', 'at', 'revurdere', 'strategierne', 'og', 'sætte', 'ind', 'med', 'korrigerende', 'tiltag.'],
        ],
    ];
}
