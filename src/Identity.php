<?php

declare(strict_types=1);

namespace MPijierro\IdentityPhp;

/**
 * Check that a string is valid for official document types in Spain
 *
 * Class Identity
 *
 * @package MPijierro\IdentityPhp
 */
final class Identity
{
    public function isValidIBAN(string $aIbanNumber): bool
    {
        $iban = new \IBAN();

        return $iban->Verify($aIbanNumber);
    }

    /**
     * Check that CIF string is valid
     *
     * @param string $cif
     * @return bool
     */
    public function isValidCIF(string $cif): bool
    {
        $cifRegEx1 = '/^[ABEH][0-9]{8}$/i';
        $cifRegEx2 = '/^[KPQS][0-9]{7}[A-J]$/i';
        $cifRegEx3 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';

        if (preg_match($cifRegEx1, $cif) || preg_match($cifRegEx2, $cif) || preg_match($cifRegEx3, $cif)) {
            $control = $cif[strlen($cif) - 1];
            $suma_A = 0;
            $suma_B = 0;

            for ($i = 1; $i < 8; $i++) {
                if ($i % 2 == 0) {
                    $suma_A += (int) $cif[$i];
                } else {

                    $t = (string) ((int) $cif[$i] * 2);
                    $p = 0;

                    for ($j = 0; $j < strlen($t); $j++) {
                        $p += substr($t, $j, 1);
                    }
                    $suma_B += $p;
                }
            }

            $suma_C = (int) ($suma_A + $suma_B)."";
            $suma_D = (10 - (int) $suma_C[strlen($suma_C) - 1]) % 10;

            $letras = "JABCDEFGHI";

            if ($control >= "0" && $control <= "9") {
                return ($control == $suma_D);
            }

            return (strtoupper($control) == $letras[$suma_D]);
        }

        return false;
    }

    /**
     * Check that NIF string is valid
     *
     * @param string $nif
     * @return bool
     */
    public function isValidNIF(string $nif): bool
    {
        $nifRegEx = '/^[0-9]{8}[A-Z]$/i';

        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

        if (preg_match($nifRegEx, $nif)) {
            return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
        }

        return false;
    }

    /**
     * * Check that NIE string is valid
     *
     * @param string $nif
     * @return bool
     */
    public function isValidNIE(string $nif): bool
    {
        $nieRegEx = '/^[KLMXYZ][0-9]{7}[A-Z]$/i';
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

        if (preg_match($nieRegEx, $nif)) {

            $r = str_replace(['X', 'Y', 'Z'], [0, 1, 2], $nif);

            return ($letras[(substr($r, 0, 8) % 23)] == $nif[8]);
        }

        return false;

    }
}