# CPF Validation Functions

[![PHP 8.5+](https://img.shields.io/badge/PHP-8.5%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![License: GPL v3](https://img.shields.io/badge/License-GPL--3.0--or--later-blue.svg)](LICENSE)

Small, dependency-free PHP functions for validating Brazilian CPF (Cadastro de Pessoas Fisicas) numbers. Use a boolean check when invalid input is expected, or an assertion when invalid input should stop execution.

## Requirements

- PHP 8.5 or later

## Installation

Install the package with Composer:

```bash
composer require cancio-labs/cpf-validation-function
```

Composer autoloads both functions automatically.

## Usage

The validator accepts CPF values in either of these exact formats:

- Raw: `99999999999`
- Formatted: `999.999.999-99`

It rejects malformed input, repeated-digit CPFs such as `000.000.000-00`, and values whose check digits do not match.

### `is_valid_cpf`

Use `is_valid_cpf(?string $cpf): bool` when you need to test a value without handling an exception.

```php
<?php

use function CancioLabs\Functions\Cpf\is_valid_cpf;

is_valid_cpf('94537020059');     // true
is_valid_cpf('945.370.200-59');  // true

is_valid_cpf('94537020000');     // false: invalid check digits
is_valid_cpf('000.000.000-00');  // false: repeated digits
is_valid_cpf(null);              // false
```

### `assert_cpf`

Use `assert_cpf(?string $cpf): void` to enforce a valid CPF. It throws `InvalidArgumentException` when the value is invalid.

```php
<?php

use function CancioLabs\Functions\Cpf\assert_cpf;

assert_cpf('033.039.290-50'); // Continues normally.

try {
    assert_cpf('03303929000');
} catch (InvalidArgumentException $exception) {
    // Handle an invalid CPF.
}
```

## Validation behavior

| Input            | Result                          |
|------------------|---------------------------------|
| `94537020059`    | Valid                           |
| `945.370.200-59` | Valid                           |
| `945 370 200 59` | Invalid: unsupported format     |
| `945.370.200-00` | Invalid: incorrect check digits |
| `11111111111`    | Invalid: repeated digits        |
| `null` or `''`   | Invalid                         |

## Development

Install development dependencies and run the test suite:

```bash
composer install
vendor/bin/phpunit tests
```

## Contributing

Contributions are welcome. Please include tests for behavior changes and keep the public API backward compatible where possible.

## License

This project is licensed under the [GNU General Public License v3.0 or later](LICENSE).
