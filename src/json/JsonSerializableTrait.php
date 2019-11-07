<?php


namespace ndashutin\tools\serializable\json;

use ndashutin\tools\rawdataprocessor\exception\RawDataProcessorException;
use ndashutin\tools\rawdataprocessor\json\JsonRawDataProcessor;

/**
 * Trait JsonSerializableTrait
 * @package ndashutin\tools\serializable\json
 */
trait JsonSerializableTrait
{
    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     * @throws RawDataProcessorException
     */
    public function jsonSerialize()
    {
        $serializer = new JsonSerializer(new JsonRawDataProcessor());
        $properties = get_object_vars($this);
        return $serializer->serialize($properties);
    }
}