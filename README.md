# CPF functions

This tiny package contains some functions to validate a CPF (Brazilian ID)

## Requirements

PHP 7.4 or greater is required, nothing else.

## Installation

    composer require cancio-labs/cpf-validation-function

## Functions

1. is_valid_cpf 
2. assert_cpf

## How to use it

### is_valid_cpf(string $cpf): bool

Returns true if the CPF is valid, false otherwise.

```
use function CancioLabs\Functions\Cpf\is_valid_cpf;

// Passing formatted CPFs
is_valid_cpf('170.317.330-90') // returns true
is_valid_cpf('170.317.330-00') // returns false

// Passing raw CPFs
is_valid_cpf('17031733090') // returns true
is_valid_cpf('17031733000') // returns false
```

### assert_cpf(string $cpf): void

Validates the CPF and throw an InvalidArgumentException if the CPF is not valid.

```
use function CancioLabs\Functions\Cpf\assert_cpf;

// These 2 example will execute normally
assert_cpf('170.317.330-90');
assert_cpf('17031733090');

// These 3 examples throw InvalidArgumentException
assert_cpf('')
assert_cpf('foo')
assert_cpf('17031733000')
```

## Running Tests

- From the project root, run: `vendor/bin/phpunit .`