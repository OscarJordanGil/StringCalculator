<?php

declare(strict_types=1);

namespace OscarJordanGil\StringCalculator\Test;

use OscarJordanGil\StringCalculator\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function string_vacio_devuelve_0()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("");

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function uno_devuelve_1()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1");

        $this->assertEquals("1", $result);
    }

    /**
     * @test
     */
    public function uno_y_dos_devuelve_tres()
    {
         $StringCalculator = new StringCalculator();

         $result = $StringCalculator->calcular("//,\n1,2");

         $this->assertEquals("3", $result);
    }

    /**
     * @test
     */
    public function entre_separadores_no_hay_numero_error_numero_esperado()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,,2");

        $this->assertEquals("Number expected but NOT found", $result);
    }

    /**
     * @test
     */
    public function ultimo_valor_es_separador_error_numero_esperado()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,2,");

        $this->assertEquals("Number expected but NOT found", $result);
    }


    /**
     * @test
     */
    public function separador_incorrecto_error_separador()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1|2");

        $this->assertEquals(", expected but | found at position 3", $result);
    }

    /**
     * @test
     */
    public function numero_negativo_error_no_permitidos()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,-6");

        $this->assertEquals("Negative not allowed : -6", $result);
    }


    /**
     * @test
     */
    public function numeros_negativos_error_no_permitidos()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,-6,-4");

        $this->assertEquals("Negative not allowed : -6, -4", $result);
    }


    /**
     * @test
     */
    public function numerosos_errores_devuelven_varias_excepciones()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,,2,-8");

        $this->assertEquals("Negative not allowed : -8\nNumber expected but NOT found", $result);
    }
}
