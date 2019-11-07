<?php


namespace ndashutin\tools\serializable\tests;

use ndashutin\tools\serializable\json\JsonSerializer;
use PHPUnit\Framework\TestCase;

/**
 * Class JsonSerializer
 * @package ndashutin\tools\serializable\tests
 */
class JsonSerializerTest extends TestCase
{
    /**
     * Method testClassExists
     */
    public function testClassExists(): void
    {
        $this->assertTrue(class_exists(JsonSerializer::class));
    }
}