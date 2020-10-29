<?php

namespace Spatie\IcalendarGenerator\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Spatie\IcalendarGenerator\ComponentPayload;
use Spatie\IcalendarGenerator\Properties\Property;
use Spatie\Snapshots\MatchesSnapshots;

abstract class TestCase extends BaseTestCase
{
    use MatchesSnapshots;

    protected function assertPropertyExistInPayload(string $name, ComponentPayload $componentPayload): void
    {
        $this->assertNotNull($componentPayload->getProperty($name));
    }

    protected function assertPropertyNotInPayload(string $name, ComponentPayload $componentPayload): void
    {
        $this->assertObjectNotHasAttribute($name, $componentPayload);
    }

    protected function assertPropertyEqualsInPayload(string $name, $value, ComponentPayload $componentPayload): void
    {
        $this->assertEquals($value, $componentPayload->getProperty($name)->getOriginalValue());
    }

    protected function assertParameterEqualsInProperty(string $name, $value, Property $propertyType): void
    {
        $this->assertEquals($value, $propertyType->getParameter($name)->getValue());
    }

    protected function assertParameterCountInProperty(int $count, Property $propertyType): void
    {
        $this->assertCount($count, $propertyType->getParameters());
    }
}
