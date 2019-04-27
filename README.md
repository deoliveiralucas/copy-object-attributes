# CopyObjectAttributeValues

[![Build Status](https://travis-ci.com/deoliveiralucas/copy-object-attributes-values.svg?branch=master)](https://travis-ci.com/deoliveiralucas/copy-object-attributes-values)
[![Code Coverage](https://scrutinizer-ci.com/g/deoliveiralucas/copy-object-attributes-values/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/deoliveiralucas/copy-object-attributes-values/?branch=master)
[![Code Quality](https://scrutinizer-ci.com/g/deoliveiralucas/copy-object-attributes-values/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/deoliveiralucas/copy-object-attributes-values/?branch=master)
[![License MIT](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/deoliveiralucas/copy-object-attributes-values/blob/master/LICENSE)
[![Packagist](http://img.shields.io/packagist/v/deoliveiralucas/copy-object-attributes-values.svg?style=flat)](https://packagist.org/packages/deoliveiralucas/copy-object-attributes-values)

Simple helper to copy attributes values with the same name from one object to an other.

## Installation

```
composer require deoliveiralucas/copy-object-attributes-values
```

## Usage

```php
use CopyObjectAttributesValues\CopyObjectAttributesValues;

class ObjectA {
    private $attributeA = 'ObjectA_AttrA';
    private $attributeB = 'ObjectA_AttrB';
}
class ObjectB {
    private $attributeA = 'ObjectB_AttrA';
    private $attributeB = 'ObjectB_AttrB';
    private $attributeC = 'ObjectB_AttrC';
}

$objectA = new ObjectA();
$objectB = new ObjectB();

CopyObjectAttributesValues::from($objectA)->to($objectB);

var_dump($objectB);

/*
Output:
class ObjectB#2 (3) {
  private $attributeA =>
  string(13) "ObjectA_AttrA"
  private $attributeB =>
  string(13) "ObjectA_AttrB"
  private $attributeC =>
  string(13) "ObjectB_AttrC"
}
*/
```

## Contributing ##

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

CopyObjectAttributeValues is released under the MIT License. Please see [License File](LICENSE) for more information.