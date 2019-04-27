<?php

namespace CopyObjectAttributesValuesTest\CopyObjectAttributesValuesTest;

class ClassForAttributesATest
{

    private $privateAttribute;
    public $publicAttribute;
    private $attrCantBeChangedA;

    public function __construct(string $privateAttribute, string $publicAttribute, string $attrCantBeChangedA)
    {
        $this->privateAttribute = $privateAttribute;
        $this->publicAttribute = $publicAttribute;
        $this->attrCantBeChangedA = $attrCantBeChangedA;
    }

    public function privateAttribute() : string
    {
        return $this->privateAttribute;
    }

    public function attrCantBeChangedA() : string
    {
        return $this->attrCantBeChangedA;
    }
}
