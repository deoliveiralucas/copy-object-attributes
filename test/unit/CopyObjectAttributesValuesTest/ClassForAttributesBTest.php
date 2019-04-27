<?php

namespace CopyObjectAttributesValuesTest\CopyObjectAttributesValuesTest;

class ClassForAttributesBTest
{

    private $privateAttribute;
    public $publicAttribute;
    private $attrCantBeChangedB;

    public function __construct(string $privateAttribute, string $publicAttribute, string $attrCantBeChangedB)
    {
        $this->privateAttribute = $privateAttribute;
        $this->publicAttribute = $publicAttribute;
        $this->attrCantBeChangedB = $attrCantBeChangedB;
    }

    public function privateAttribute() : string
    {
        return $this->privateAttribute;
    }

    public function attrCantBeChangedB() : string
    {
        return $this->attrCantBeChangedB;
    }
}
