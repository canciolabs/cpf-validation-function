<?php

namespace CancioLabs\Functions\Cpf\Tests;

use InvalidArgumentException;
use function CancioLabs\Functions\Cpf\is_valid_cpf;

class IsValidCpfTest extends CpfTestCase
{

    /**
     * @dataProvider invalidCpfDataProvider
     */
    public function testConstructorWhenCpfIsInvalid(string $invalidCPF): void
    {
        $this->assertFalse(is_valid_cpf($invalidCPF));
    }

    /**
     * @dataProvider validCpfDataProvider
     */
    public function testConstructorAndGetters(string $raw, string $formatted): void
    {
        $this->assertTrue(is_valid_cpf($raw));
        $this->assertTrue(is_valid_cpf($formatted));
    }

}