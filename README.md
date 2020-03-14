# Big List of Naughty Strings (Now with more PHP!)

A PHP class to easily work with the [Big List of Naughty Strings](https://github.com/minimaxir/big-list-of-naughty-strings).

## Installation

```
composer require mattsparks/blns-php
```

## Usage

```php
use MattSparks\BLNS\BLNS;

$blns = new BLNS;

foreach($blns->getList() as $string) {
    // Do your magic.
}

foreach($blns->getBase64List() as $string) {
    // Magic done here.
}
```

## Contribute
Contributions are very welcome!

1. Follow the [PSR-2 Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
2. Send a pull request.