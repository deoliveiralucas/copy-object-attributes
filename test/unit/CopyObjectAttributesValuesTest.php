<?php

declare(strict_types=1);

namespace CopyObjectAttributesValuesTest;

use CopyObjectAttributesValues\CopyObjectAttributesValues;
use CopyObjectAttributesValuesTest\CopyObjectAttributesValuesTest\ClassForAttributesATest;
use CopyObjectAttributesValuesTest\CopyObjectAttributesValuesTest\ClassForAttributesBTest;
use PHPUnit\Framework\TestCase;

class CopyObjectAttributesValuesTest extends TestCase
{

    /**
     * @dataProvider objectsToBeCopiedProvider
     *
     * @param ClassForAttributesATest $fromObject
     * @param ClassForAttributesBTest $toObject
     */
    public function testCopyFromToObject(ClassForAttributesATest $fromObject, ClassForAttributesBTest $toObject) : void
    {
        $this->assertNotEquals($fromObject->privateAttribute(), $toObject->privateAttribute());
        $this->assertNotEquals($fromObject->publicAttribute, $toObject->publicAttribute);
        $this->assertNotEquals($fromObject->attrCantBeChangedA(), $toObject->attrCantBeChangedB());

        CopyObjectAttributesValues::from($fromObject)->to($toObject);

        $this->assertEquals($fromObject->privateAttribute(), $toObject->privateAttribute());
        $this->assertEquals($fromObject->publicAttribute, $toObject->publicAttribute);
        $this->assertNotEquals($fromObject->attrCantBeChangedA(), $toObject->attrCantBeChangedB());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCopyFromInvalidParameter() : void
    {
        CopyObjectAttributesValues::from('test');
    }

    /**
     * @dataProvider objectsToBeCopiedProvider
     * @expectedException \RuntimeException
     *
     * @param ClassForAttributesATest $fromObject
     */
    public function testCopyToInvalidParameter(ClassForAttributesATest $fromObject) : void
    {
        CopyObjectAttributesValues::from($fromObject)->to('test');
    }

    public function objectsToBeCopiedProvider() : array
    {
        $fromObject = new ClassForAttributesATest(
            'PrivateContentFromObject',
            'PublicContentFromObject',
            'ContentFromCantBeChanged'
        );

        $toObject = new ClassForAttributesBTest(
            'PrivateContentToObject',
            'PublicContentToObject',
            'ContentToCantBeChanged'
        );

        return [
            'Mocked objects' => [ $fromObject, $toObject ]
        ];
    }
}
