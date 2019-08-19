<?php

declare(strict_types=1);

namespace CopyObjectAttributesValues;

class CopyObjectAttributesValues
{

    /** @var object */
    private $fromObject;

    /** @var \ReflectionClass */
    private $fromObjectReflection;

    private function __construct($object)
    {
        $this->fromObject = $object;
        $this->fromObjectReflection = new \ReflectionClass($object);
    }

    public function to($toObject) : void
    {
        if (! is_object($toObject)) {
            throw new \RuntimeException(
                sprintf('Parameter to "%s::to" must be an object, "%s" given', gettype($toObject), __CLASS__)
            );
        }

        $toObjectReflection = new \ReflectionClass($toObject);

        $props = $this->fromObjectReflection->getProperties();

        foreach ($props as $prop) {
            $prop->setAccessible(true);

            $propName = $prop->getName();

            if ($toObjectReflection->hasProperty($propName)) {
                $propToObject = $toObjectReflection->getProperty($propName);
                $propToObject->setAccessible(true);
                $propToObject->setValue($toObject, $prop->getValue($this->fromObject));
            }
        }
    }

    public static function from($fromObject) : self
    {
        if (! is_object($fromObject)) {
            throw new \RuntimeException(
                sprintf('Parameter to "%s::from" must be an object, "%s" given', gettype($fromObject), __CLASS__)
            );
        }

        return new self($fromObject);
    }
}
