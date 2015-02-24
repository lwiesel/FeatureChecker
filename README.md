# FeatureChecker

[![Packagist](https://img.shields.io/packagist/v/lwiesel/feature-checker.svg)](https://packagist.org/packages/lwiesel/feature-checker)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/lwiesel/FeatureChecker/master.svg?style=flat-square)](https://travis-ci.org/lwiesel/FeatureChecker)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/lwiesel/FeatureChecker.svg?style=flat-square)](https://scrutinizer-ci.com/g/lwiesel/FeatureChecker/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/lwiesel/FeatureChecker.svg?style=flat-square)](https://scrutinizer-ci.com/g/lwiesel/FeatureChecker)
[![HHVM](https://img.shields.io/hhvm/lwiesel/feature-checker.svg)](http://hhvm.h4cc.de/package/lwiesel/feature-checker)
[![Total Downloads](https://img.shields.io/packagist/dt/lwiesel/feature-checker.svg?style=flat-square)](https://packagist.org/packages/lwiesel/feature-checker)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/cdfe22bc-1889-43a2-a416-3a06e2f6f2d3/big.png)](https://insight.sensiolabs.com/projects/cdfe22bc-1889-43a2-a416-3a06e2f6f2d3)

Define features, and check if they are activated or not in your php application.
Integrates well with Symfony2 bundle [lwiesel/FeatureCheckerBundle](https://github.com/lwiesel/FeatureCheckerBundle).

## Install

Via Composer

``` bash
$ composer require lwiesel/feature-checker
```

## Usage

``` php
$features = [
    'feature-A' => true,
    'feature-B' => false,
];
$checker = new LWI\FeatureChecker($features);
// ...
if ($checker->isFeatureEnabled('feature-A')) {
    // Do something here
}
```

## Testing

``` bash
$ bin/phpspec run
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for details.

## Security

If you discover any security related issues, please email [wiesel.laurent@gmail.com](wiesel.laurent@gmail.com) instead of using the issue tracker.

## Credits

- [Laurent Wiesel](https://github.com/lwiesel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
