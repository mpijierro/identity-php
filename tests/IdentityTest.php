<?php

namespace MPijierro\IdentityPhp\tests;

use MPijierro\IdentityPhp\Identity;
use PHPUnit\Framework\TestCase;

class IdentityTest extends TestCase
{
    /**
     * @var Identity
     */
    private $identity;

    public function setUp()
    {
        $this->identity = new Identity();
    }

    public function test_valid_cif()
    {
        $this->assertTrue($this->identity->isValidCIF('Q6887124C'));
        $this->assertTrue($this->identity->isValidCIF('J51062271'));
        $this->assertTrue($this->identity->isValidCIF('D9990690A'));
        $this->assertTrue($this->identity->isValidCIF('N8796829C'));
    }

    public function test_invalid_cif()
    {
        $this->assertFalse($this->identity->isValidCIF('Q6887124'));
        $this->assertFalse($this->identity->isValidCIF('Q6887123C'));
        $this->assertFalse($this->identity->isValidCIF('6887123C'));
        $this->assertFalse($this->identity->isValidCIF(''));
        $this->assertFalse($this->identity->isValidCIF('AAAAAAAAAAAAAAA'));
        $this->assertFalse($this->identity->isValidCIF('Q6887|124C'));
    }

    public function test_throw_exception_when_cif_not_is_string_value()
    {
        $this->expectException(\TypeError::class);
        $this->assertFalse($this->identity->isValidCIF(null));
    }

    public function test_valid_nif()
    {
        $this->assertTrue($this->identity->isValidNIF('21361012S'));
        $this->assertTrue($this->identity->isValidNIF('64160547T'));
        $this->assertTrue($this->identity->isValidNIF('48692083W'));
        $this->assertTrue($this->identity->isValidNIF('08861617Q'));
    }

    public function test_invalid_nif()
    {
        $this->assertFalse($this->identity->isValidNIF('21361012'));
        $this->assertFalse($this->identity->isValidNIF('1361012S'));
        $this->assertFalse($this->identity->isValidNIF('12345678F'));
        $this->assertFalse($this->identity->isValidNIF('008861617Q'));
        $this->assertFalse($this->identity->isValidNIF(''));

        $this->assertTrue($this->identity->isValidNIF('08861617Q'));
        $this->assertFalse($this->identity->isValidNIF('08861|617Q'));

        $this->assertFalse($this->identity->isValidNIF('X3212050P')); //nie
    }

    public function test_throw_exception_when_nif_not_is_string_value()
    {
        $this->expectException(\TypeError::class);
        $this->assertFalse($this->identity->isValidNIF(null));
    }

    public function test_valid_nie()
    {
        $this->assertTrue($this->identity->isValidNIE('X3212050P'));
        $this->assertTrue($this->identity->isValidNIE('X2792997S'));
    }

    public function test_invalid_nie()
    {
        $this->assertFalse($this->identity->isValidNIE('Z8930474'));
        $this->assertFalse($this->identity->isValidNIE('8930474Q'));
        $this->assertFalse($this->identity->isValidNIE('Z893999Q'));
        $this->assertFalse($this->identity->isValidNIE(''));

        $this->assertTrue($this->identity->isValidNIE('X3212050P'));
        $this->assertFalse($this->identity->isValidNIE('X321|2050P'));
        $this->assertFalse($this->identity->isValidNIE('08861617Q')); //nif
    }

    public function test_throw_exception_when_nie_not_is_string_value()
    {
        $this->expectException(\TypeError::class);
        $this->assertFalse($this->identity->isValidNIE(null));
    }

    public function test_valid_iban()
    {
        $this->assertTrue($this->identity->isValidIBAN('ES9100490013112991609374'));
        $this->assertTrue($this->identity->isValidIBAN('ES09 2038-0626-0160-0002-5280'));
        $this->assertTrue($this->identity->isValidIBAN('ES 58 0075 0204 9406 0081 1004'));
        $this->assertTrue($this->identity->isValidIBAN('ES98 – 3190 – 0974 – 34 - 4255071823'));
        $this->assertTrue($this->identity->isValidIBAN('ES31-2080-5155-9730-4000-0250'));
        $this->assertTrue($this->identity->isValidIBAN('ES94 2095 5381 1910 6117 3539'));

    }

    public function test_invalid_iban()
    {

        $this->assertFalse($this->identity->isValidIBAN('ES9100490013112991609374a'));
        $this->assertFalse($this->identity->isValidIBAN('9100490013112991609374a'));
        $this->assertFalse($this->identity->isValidIBAN('9100490013112991609374a'));
        $this->assertFalse($this->identity->isValidIBAN(''));

        $this->assertTrue($this->identity->isValidIBAN('ES94 2095 5381 1910 6117 3539'));
        $this->assertFalse($this->identity->isValidIBAN('ES94 2095 53|1 1910 6117 3539'));

    }

    public function test_throw_exception_when_iban_not_is_string_value()
    {
        $this->expectException(\TypeError::class);
        $this->assertFalse($this->identity->isValidIBAN(null));
    }
}