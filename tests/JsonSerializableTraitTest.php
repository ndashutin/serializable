<?php


namespace ndashutin\tools\serializable\tests;

use ndashutin\tools\rawdataprocessor\exception\RawDataProcessorException;
use ndashutin\tools\serializable\json\JsonSerializableTrait;
use ndashutin\tools\serializable\tests\data\SerializableClass;
use ndashutin\tools\serializable\tests\data\SerializableClassParent;
use PHPUnit\Framework\TestCase;

/**
 * Class JsonSerializableTraitTest
 * @package ndashutin\tools\serializable\tests
 */
class JsonSerializableTraitTest extends TestCase
{
    /**
     * Method testTraitExists
     */
    public function testTraitExists(): void
    {
        $this->assertTrue(trait_exists(JsonSerializableTrait::class));
    }

    /**
     * Method testTrait
     * @throws RawDataProcessorException
     */
    public function testTrait(): void
    {
        $class = new SerializableClassParent();
        $data = $class->jsonSerialize();
        $this->assertEquals('{"value1":1,"value2":2,"value3":3}', $data);
    }

    /**
     * Method testTraitForInheritor
     * @throws RawDataProcessorException
     */
    public function testTraitForInheritor(): void
    {
        $class = new SerializableClass();
        $data = $class->jsonSerialize();
        $this->assertEquals('{"value4":2,"value5":[2],"value6":[1,2,1],"value1":1,"value2":2}', $data);
    }
}