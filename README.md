# Faker PHP — da_DK locale

Danish (`da_DK`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-da-dk
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('da_DK');

$faker->name();        // "Freja Nielsen"
$faker->fullAddress(); // "Vestergade 12, 8000 Aarhus"
$faker->cpr();         // "0707614285"
```

Generators without a `da_DK` variant fall back to the default locale.

## Locale-specific generators

| Method | Extension | Description |
| --- | --- | --- |
| `region()` | Address | The 5 regions |
| `postcode()` | Address | 4 digits postnummer |
| `cpr(?string $gender, bool $formatted)` | Person | CPR number with a century-consistent 7th digit, passing the modulus 11 check |
| `companyNumber()` | Company | CVR number passing the modulus 11 check |
| `vat()` | Company | `DK` + CVR number |
| `iban()` | Financial | `DK` IBAN |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerDaDkServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
