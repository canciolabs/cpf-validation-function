<?php

declare(strict_types=1);

namespace CancioLabs\Functions\Cpf\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use function CancioLabs\Functions\Cpf\is_valid_cpf;

class IsValidCpfTest extends CpfTestCase
{

    #[DataProvider('invalidCpfDataProvider')]
    public function testConstructorWhenCpfIsInvalid(?string $invalidCPF): void
    {
        $this->assertFalse(is_valid_cpf($invalidCPF));
    }

    #[DataProvider('validCpfDataProvider')]
    public function testConstructorAndGetters(string $raw, string $formatted): void
    {
        $this->assertTrue(is_valid_cpf($raw));
        $this->assertTrue(is_valid_cpf($formatted));
    }

}