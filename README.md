[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

## caseconvert

A simple library for converting arbitrary case style texts to other cases.
### Supported cases
* camelCase
* PascalCase
* snake_case
* kebab-case
* dot.case

## Getting Started

### Prerequisites
* PHP 8.1.0

### Installation

Get it via composer:

   ```sh
   composer require ashdevelops/php-case 
   ```

## Usage

Detect the case:
```php
<?php

use CaseConverter\CaseDetector;
use CaseConverter\Validators\PascalCaseValidator;

include 'vendor/autoload.php';

$validators = [
    new PascalCaseValidator(),
];

$arbitraryString = 'SomeArbitraryString';
$detector = new CaseDetector($validators);

echo $detector->detect($arbitraryString)->name; // string(6) "Pascal"
```

Snake case to camel:

   ```php
    <?php

    use CaseConverter\CaseType;
    use CaseConverter\Converters\CamelCaseConverter;
    
    include 'vendor/autoload.php';
    
    $camelConverter = new CamelCaseConverter();
    echo $camelConverter->convert('camel_case', CaseType::Snake); // string(9) "camelCase"
   ```
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Top contributors:

<a href="https://github.com/ashdevelops/php-case/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=ashdevelops/php-case" alt="contrib.rocks image" />
</a>

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

[contributors-shield]: https://img.shields.io/github/contributors/ashdevelops/php-case.svg?style=for-the-badge
[contributors-url]: https://github.com/ashdevelops/php-case/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/ashdevelops/php-case.svg?style=for-the-badge
[forks-url]: https://github.com/ashdevelops/php-case/network/members
[stars-shield]: https://img.shields.io/github/stars/ashdevelops/php-case.svg?style=for-the-badge
[stars-url]: https://github.com/ashdevelops/php-case/stargazers
[issues-shield]: https://img.shields.io/github/issues/ashdevelops/php-case.svg?style=for-the-badge
[issues-url]: https://github.com/ashdevelops/php-case/issues
[license-shield]: https://img.shields.io/github/license/ashdevelops/php-case.svg?style=for-the-badge
[license-url]: https://github.com/ashdevelops/php-case/blob/master/LICENSE.txt
[package-name]: ashdevelops/php-case