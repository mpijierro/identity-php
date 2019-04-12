# IdentityPhp

Check valid spanish document as NIF, CIF, NIE and IBAN back account. This package is a simplied
 version for PHP whose origin is in a package written for Laravel (https://github.com/mpijierro/identity).

## Installation

Install the latest version with:

```php
$ composer required "mpijierro/identity-php"
```

## Usage

Plug and play, instance and use it.

```php
<?php
use MPijierro\IdentityPhp\Identity;

$identity = new Identity();

$isValid = $identity->isValidCIF('fooBar'); //Example, check if CIF document is valid
//...
//...

```

All methods returns true or false.

### License

IdentityPhp is licensed under the MIT License - see the `LICENSE` file for details

### Acknowledgements

The original code for NIF, CIF AND NIE is in next link

http://www.michublog.com/informatica/8-funciones-para-la-validacion-de-formularios-con-expresiones-regulares

Thanks to original code of: globalcitizen/php-iban
 
 https://github.com/globalcitizen/php-iban
 
Thanks to original code for the validation of the NNSS of: http://intervia.com
 
 http://intervia.com/doc/validar-numeros-de-la-seguridad-social/

Thanks to antoiba86 (https://github.com/antoiba86). He added IBAN check in original Laravel's package.